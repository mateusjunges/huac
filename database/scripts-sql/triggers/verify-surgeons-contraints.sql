CREATE OR REPLACE FUNCTION verify_surgeons_constraints()
RETURNS TRIGGER AS
$BODY$
DECLARE countSurgeons integer := 0;
BEGIN
	-- Check for null columns:
	IF (NEW.crm IS NULL)
	THEN
		RAISE EXCEPTION 'The "crm" attribute is required!';
		RETURN NULL;
	END IF;
	
	-- Check for duplicate rows:
	countSurgeons := COUNT(*) FROM surgeons WHERE surgeons.crm = NEW.crm;
	IF (countSurgeons > 0)
	THEN
		RAISE EXCEPTION 'This CRM is already taken!';
		RETURN NULL;
	END IF;
	RETURN NEW;
	
	-- Check for string length:
	IF (SELECT LENGTH(NEW.crm) NOT BETWEEN 3 AND 20)
	THEN
		RAISE EXCEPTION 'The "crm" must have between 3 and 20 characters!';
		RETURN NULL;
	END IF;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER verify_surgeons_constraints BEFORE INSERT ON surgeons
FOR EACH ROW EXECUTE PROCEDURE verify_surgeons_constraints();