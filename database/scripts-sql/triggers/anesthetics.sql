CREATE OR REPLACE FUNCTION verify_anesthetics_constraints()
RETURNS TRIGGER AS
$BODY$
BEGIN
	-- Check for null columns:
	IF (NEW.name IS NULL)
	THEN
		RAISE EXCEPTION 'The "name" attribute is required!';
		RETURN NULL;
	END IF;

	-- Check for string length:
	IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 70)
	THEN
		RAISE EXCEPTION 'The "name" attribute must have between 1 and 60 characters!';
		RETURN NULL;
	END IF;

	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

-- Before insert:
CREATE TRIGGER verify_anesthetics_constraints BEFORE INSERT ON anesthetics
FOR EACH ROW EXECUTE PROCEDURE verify_anesthetics_constraints();

-- Before update:
CREATE TRIGGER verify_anesthetics_constraints_before_update BEFORE UPDATE ON anesthetics
FOR EACH ROW EXECUTE PROCEDURE verify_anesthetics_constraints();
