CREATE OR REPLACE FUNCTION verify_null_fields_on_users()
RETURNS TRIGGER AS
$BODY$
DECLARE countUsername integer := 0;
BEGIN
	-- Check for null columns:
	IF (NEW.email IS NULL || NEW.name IS NULL || NEW.username IS NULL)
	THEN
		RAISE NOTICE 'Email, name and username are required!';
		RETURN NULL;
	END IF;
	-- Verify if the NEW.username is unique on database:
	countUsername := SELECT COUNT(users.username) FROM users WHERE username = NEW.username;
	IF (countUsername > 0)
	THEN 
		RAISE NOTICE 'Username already exists.';
		RETURN NULL;
	END IF;
	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER verify_null_columns_before_insert_on_users BEFORE INSERT ON "users"
FOR EACH ROW EXECUTE PROCEDURE verify_null_fields_on_users();