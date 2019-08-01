CREATE OR REPLACE FUNCTION verify_users_constraints()
RETURNS TRIGGER AS
$BODY$
DECLARE countUsername integer := 0;
BEGIN
	-- Check for null columns
	IF (NEW.name IS NULL)
	THEN
		RAISE EXCEPTION 'The "name" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.email IS NULL)
	THEN
		RAISE EXCEPTION 'The "email" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.username IS NULL)
	THEN
		RAISE EXCEPTION 'The "username" attribute is required!';
		RETURN NULL;
	END IF;

	-- Email validation:
	IF (NEW.email NOT LIKE '%_@__%.__%')
	THEN
		RAISE EXCEPTION 'Please enter a valid email!';
		RETURN NULL;
	END IF;

	-- Check for string length:
	IF (SELECT LENGTH(NEW.name) NOT BETWEEN 3 AND 70)
	THEN
		RAISE EXCEPTION 'The "name" attribute must have between 3 and 70 characters!';
		RETURN NULL;
	ELSIF (SELECT LENGTH(NEW.username) NOT BETWEEN 3 AND 30)
	THEN
		RAISE EXCEPTION 'The "username" must have between 3 and 30 characters!';
		RETURN NULL;
	END IF;

	-- Check for unique username:
	countUsername := COUNT(users.username) FROM users WHERE username = NEW.username;
	IF (countUsername > 0)
	THEN
		RAISE NOTICE 'Username already exists.';
		RETURN NULL;
	END IF;

	RETURN NEW;

END;
$BODY$
LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION verify_users_constraints_for_update()
RETURNS TRIGGER AS
$BODY$
DECLARE countUsername integer := 0;
BEGIN
	-- Check for null columns
	IF (NEW.name IS NULL)
	THEN
		RAISE EXCEPTION 'The "name" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.email IS NULL)
	THEN
		RAISE EXCEPTION 'The "email" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.username IS NULL)
	THEN
		RAISE EXCEPTION 'The "username" attribute is required!';
		RETURN NULL;
	END IF;

	-- Email validation:
	IF (NEW.email NOT LIKE '%_@__%.__%')
	THEN
		RAISE EXCEPTION 'Please enter a valid email!';
		RETURN NULL;
	END IF;

	-- Check for string length:
	IF (SELECT LENGTH(NEW.name) NOT BETWEEN 3 AND 70)
	THEN
		RAISE EXCEPTION 'The "name" attribute must have between 3 and 70 characters!';
		RETURN NULL;
	ELSIF (SELECT LENGTH(NEW.username) NOT BETWEEN 3 AND 30)
	THEN
		RAISE EXCEPTION 'The "username" must have between 3 and 30 characters!';
		RETURN NULL;
	END IF;

	-- Check for unique username:
	countUsername := COUNT(users.username) FROM users WHERE username = NEW.username AND users.id <> OLD.id;
	IF (countUsername > 0)
	THEN
		RAISE NOTICE 'Username already exists.';
		RETURN NULL;
	END IF;

	RETURN NEW;

END;
$BODY$
LANGUAGE plpgsql;


CREATE TRIGGER verify_users_constraints BEFORE INSERT ON users
FOR EACH ROW EXECUTE PROCEDURE verify_users_constraints();

CREATE TRIGGER verify_users_constraints_before_update BEFORE UPDATE ON users
FOR EACH ROW EXECUTE PROCEDURE verify_users_constraints_for_update();
