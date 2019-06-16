CREATE OR REPLACE FUNCTION verify_surgeries_constraints()
RETURNS TRIGGER AS
$BODY$
BEGIN
	-- Check for null columns:
	IF (NEW.estimated_duration_time IS NULL)
	THEN
		RAISE EXCEPTION 'The "estimated_duration_time" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.materials IS NULL)
	THEN
		RAISE EXCEPTION 'The "materials" column is required!';
		RETURN NULL;
	ELSIF (NEW.procedure_id IS NULL)
	THEN
		RAISE EXCEPTION 'The "procedure_id" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.surgery_classification_id IS NULL)
	THEN
		RAISE EXCEPTION 'The "surgery_classification_id" attribute is required!';
		RETURN NULL;
	ELSIF (NEW.patient_id IS NULL)
	THEN
		RAISE EXCEPTION 'The "patient_id" attribute is required!';
		RETURN NULL;
	END IF;

	-- Check for string length:
	IF (SELECT LENGTH(NEW.anesthetic_evaluation) <= 10)
	THEN
		RAISE EXCEPTION 'The "anesthetic_evaluation" must have at least 10 characters!';
		RETURN NULL;
	END IF;

	RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;


CREATE TRIGGER verify_surgeries_constraints BEFORE INSERT ON surgeries
FOR EACH ROW EXECUTE PROCEDURE verify_surgeries_constraints();

CREATE TRIGGER verify_surgeries_constraints_before_update BEFORE UPDATE ON surgeries
FOR EACH ROW EXECUTE PROCEDURE verify_surgeries_constraints();
