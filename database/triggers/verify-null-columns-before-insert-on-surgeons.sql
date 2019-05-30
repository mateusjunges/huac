CREATE OR REPLACE FUNCTION verify_null_columns_on_surgeons()
RETURNS TRIGGER AS
$BODY$
DECLARE countSurgeons integer := 0;
BEGIN
	IF (NEW.crm IS NULL || NEW.user_id IS NULL)
	THEN
		RAISE NOTICE 'The CRM and user_id are required!';
		RETURN NULL;
	END IF;
	countSurgeons := COUNT(surgeons.crm) FROM surgeons WHERE surgeons.crm = NEW.crm;
	IF (countSurgeons > 0)
	THEN
		RAISE NOTICE 'The CRM is already taken!';
		RETURN NULL;
	END IF;
END;
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER verify_null_columns_before_insert_on_surgeons BEFORE INSERT ON "surgeons"
FOR EACH ROW EXECUTE PROCEDURE verify_null_columns_on_surgeons();