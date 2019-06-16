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

CREATE TRIGGER verify_if_surgeon_is_available BEFORE INSERT ON "events"
FOR EACH ROW EXECUTE PROCEDURE verify_if_surgeon_is_available();
