CREATE OR REPLACE FUNCTION verify_status_constraints_for_update()
RETURNS TRIGGER AS
$BODY$
	DECLARE countStatus integer := 0;
BEGIN
	-- Check for duplicate rows:
	countStatus := COUNT(status.*) FROM status WHERE status.name = NEW.name AND status.id <> OLD.id;
	IF (countStatus > 0)
	THEN
		RAISE NOTICE 'The given name is already in use!';
		RETURN NULL;
	END IF;

	-- Check for required columns:
	IF(NEW.name IS NULL)
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
		RAISE NOTICE 'The name must have between 1 and 20 characters';
		RETURN NULL;
	ELSIF (SELECT LENGTH(NEW.description) <= 5)
	THEN
		RAISE NOTICE 'The description must have more than 5 characters!';
		RETURN NULL;
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION verify_status_constraints()
RETURNS TRIGGER AS
$BODY$
	DECLARE countStatus integer := 0;
BEGIN
	-- Check for duplicate rows:
	countStatus := COUNT(status.*) FROM status WHERE status.name = NEW.name;
	IF (countStatus > 0)
	THEN
		RAISE NOTICE 'The given name is already in use!';
		RETURN NULL;
	END IF;

	-- Check for required columns:
	IF(NEW.name IS NULL)
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
		RAISE NOTICE 'The name must have between 1 and 20 characters';
		RETURN NULL;
	ELSIF (SELECT LENGTH(NEW.description) <= 5)
	THEN
		RAISE NOTICE 'The description must have more than 5 characters!';
		RETURN NULL;
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;


CREATE TRIGGER verify_status_constraints_before_update_on_status BEFORE UPDATE ON "status"
FOR EACH ROW EXECUTE PROCEDURE verify_status_constraints_for_update();

CREATE TRIGGER verify_status_constraints_before_insert_on_status BEFORE INSERT ON "status"
FOR EACH ROW EXECUTE PROCEDURE verify_status_constraints();
