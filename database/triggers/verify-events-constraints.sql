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
	ELSIF (NEW.surgeon_start_at IS NULL)
	THEN
		RAISE EXCEPTION 'The "surgeon_star_at" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.surgeon_end_at IS NULL)
	THEN
		RAISE EXCEPTION 'The "surgeon_end_at" attribute is required!';
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
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER verify_events_constraints BEFORE INSERT ON events
FOR EACH ROW EXECUTE PROCEDURE verify_events_constraints();