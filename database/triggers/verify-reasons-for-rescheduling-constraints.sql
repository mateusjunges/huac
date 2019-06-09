CREATE OR REPLACE FUNCTION verify_reasons_for_rescheduling_constraints()
RETURNS TRIGGER AS
$BODY$
DECLARE countReasonsForRescheduling integer := 0;
BEGIN
	-- Check for null columns:
	IF (SELECT NEW.name IS NULL)
	THEN
		RAISE EXCEPTION 'The "name" attribute is required!';
		RETURN NULL;
	END IF;
	-- Check for duplicate rows:
	countReasonsForRescheduling := COUNT(*) FROM reasons_for_rescheduling
		WHERE reasons_for_rescheduling.name = NEW.name;
	IF (countReasonsForRescheduling > 0)
	THEN
		RAISE EXCEPTION 'The given "name" is already registered!';
		RETURN NULL;
	END IF;
	
	-- Check for string length:
	IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 70)
	THEN
		RAISE EXCEPTION 'The "name" attribute must have between 1 and 70 characters!';
		RETURN NULL;
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER verify_reasons_for_rescheduling_constraints BEFORE INSERT ON reasons_for_rescheduling
FOR EACH ROW EXECUTE PROCEDURE verify_reasons_for_rescheduling_constraints();