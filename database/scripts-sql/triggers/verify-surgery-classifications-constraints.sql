CREATE OR REPLACE FUNCTION verify_surgery_classifications_constraints()
RETURNS TRIGGER AS
$BODY$
	DECLARE countSurgeryClassifications integer := 0;
BEGIN
	-- Check for null columns:
	IF (NEW.name IS NULL)
	THEN 
		RAISE NOTICE 'The name attribute is required!';
		RETURN NULL;
	ELSIF (NEW.description IS NULL)
	THEN
		RAISE NOTICE 'The description attribute is required!';
		RETURN NULL;
	END IF;
	
		
	-- Check for string length:
	IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 20)
	THEN 
		RAISE NOTICE 'The name must have between 1 and 20 characters!';
		RETURN NULL;
	END IF;

	
	-- Check for duplicate rows:
	countSurgeryClassifications := COUNT(surgery_classifications.name) FROM surgery_classifications WHERE
								surgery_classifications.name  = NEW.name;
	IF (countSurgeryClassifications > 0)
	THEN
		RAISE NOTICE 'The name "%" is already in use!', NEW.name;
		RETURN NULL;
	END IF;

	RETURN NEW;
END;
$BODY$

LANGUAGE plpgsql;

CREATE TRIGGER verify_surgery_classifications_constraints BEFORE INSERT ON "surgery_classifications"
FOR EACH ROW EXECUTE PROCEDURE verify_surgery_classifications_constraints();