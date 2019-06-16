CREATE OR REPLACE FUNCTION verify_events_constraints()
RETURNS TRIGGER AS
$BODY$
BEGIN
	-- Check for null columns:
	IF (NEW.title IS NULL)
	THEN
		RAISE EXCEPTION 'The "title" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.color IS NULL)
	THEN
		RAISE EXCEPTION 'The "color" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.start_at IS NULL)
	THEN
		RAISE EXCEPTION 'The "start_at" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.end_at IS NULL)
	THEN
		RAISE EXCEPTION 'The "end_at" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.surgery_id IS NULL)
	THEN
		RAISE EXCEPTION 'The "surgery_id" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.surgical_room_id IS NULL)
	THEN
		RAISE EXCEPTION 'The "surgical_room_id" attribute is required!';
		RETURN NULL;
	END IF;

	-- Check for string length:
	IF (SELECT LENGTH(NEW.title) NOT BETWEEN 1 AND 70)
	THEN
		RAISE EXCEPTION 'The "title" attribute must have between 1 and 70 characters!';
		RETURN NULL;
	ELSIF (SELECT LENGTH(NEW.color) <> 7)
	THEN
		RAISE EXCEPTION 'The "color" attribute must have exactly 7 characters!';
		RETURN NULL;
	END IF;

	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

-- Verify surgeon availbility for update:
CREATE OR REPLACE FUNCTION verify_if_surgeon_is_available_for_update()
RETURNS trigger AS
$BODY$
DECLARE busySurgeons integer;
BEGIN
	IF (NEW.surgery_id <> OLD.surgery_id)
	THEN
		RAISE EXCEPTION 'You can not change the surgery while updating an event.';
		RETURN NULL;
	END IF;

    SELECT count(DISTINCT surgeon_has_surgeries.surgeon_id) INTO busySurgeons
            FROM events
            inner join surgeon_has_surgeries ON surgeon_has_surgeries.surgery_id = NEW.surgery_id
            AND surgeon_has_surgeries.surgeon_id IN (
                SELECT surgeon_has_surgeries.surgeon_id FROM surgeon_has_surgeries WHERE surgery_id = NEW.surgery_id
            )
            WHERE (
				    (events.start_at::timestamp BETWEEN NEW.start_at::timestamp AND NEW.end_at::timestamp
                     OR events.end_at::timestamp BETWEEN NEW.start_at::timestamp AND NEW.end_at::timestamp
					)
				     AND events.id <> OLD.id
				  );

    IF(busySurgeons > 0)
    THEN
        RAISE EXCEPTION 'One of the surgeons are busy at the desired scheduling period. Please, check and try again';
        RETURN NULL;
    END IF;
    -- If the surgeons of the surgery are not busy, the insertion can be finished.
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

-- Verify surgeon availability for insert:
CREATE OR REPLACE FUNCTION verify_if_surgeon_is_available()
RETURNS trigger AS
$BODY$
DECLARE busySurgeons integer;
BEGIN
    SELECT count(DISTINCT surgeon_has_surgeries.surgeon_id) INTO busySurgeons
            FROM events
            inner join surgeon_has_surgeries ON surgeon_has_surgeries.surgery_id = NEW.surgery_id
            AND surgeon_has_surgeries.surgeon_id IN (
                SELECT surgeon_has_surgeries.surgeon_id FROM surgeon_has_surgeries WHERE surgery_id = NEW.surgery_id
            )
            WHERE (events.start_at::timestamp BETWEEN NEW.start_at::timestamp AND NEW.end_at::timestamp
                  OR events.end_at::timestamp BETWEEN NEW.start_at::timestamp AND NEW.end_at::timestamp);

    IF(busySurgeons > 0)
    THEN
        RAISE NOTICE 'One of the surgeons are busy at the desired scheduling period. Please, check and try again';
        RETURN NULL;
    END IF;
    -- If the surgeons of the surgery are not busy, the insertion can be finished.
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;


CREATE TRIGGER verify_events_constraints BEFORE INSERT ON events
FOR EACH ROW EXECUTE PROCEDURE verify_events_constraints();

CREATE TRIGGER verify_if_surgeon_is_available_for_update BEFORE UPDATE ON events
FOR EACH ROW EXECUTE PROCEDURE verify_if_surgeon_is_available_for_update();

CREATE TRIGGER verify_if_surgeon_is_available BEFORE INSERT ON "events"
FOR EACH ROW EXECUTE PROCEDURE verify_if_surgeon_is_available();

