<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VerifyPatientConstraintsBeforeInsertOnPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_patient_constraints()
            RETURNS TRIGGER AS 
            \$BODY\$
                DECLARE countPatients integer := 0;
            BEGIN
                -- Check for duplicate rows:
                countPatients := COUNT(patients.*) FROM patients WHERE patients.medical_record = NEW.medical_record;
                IF(countPatients > 0) THEN
                    RAISE NOTICE 'The given medical record is already registered!';
                    RETURN NULL;
                END IF;
                -- Check for null columns:
                IF (NEW.name IS NULL) THEN
                    RAISE NOTICE 'The name attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.birthday_at IS NULL) THEN
                    RAISE NOTICE 'The birthday_at attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.mother_name IS NULL) THEN
                    RAISE NOTICE 'The mother_name  attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.gender IS NULL) THEN
                    RAISE NOTICE 'The gender attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.medical_record IS NULL) THEN
                    RAISE NOTICE 'The medical_record attribute is required!';
                    RETURN NULL;
                END IF;
                -- Check for minstring length
                IF(SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 70)THEN
                    RAISE NOTICE 'The name must have between 1 and 70 characters';
                    RETURN NULL;
                ELSIF(SELECT LENGTH(NEW.mother_name) NOT BETWEEN 1 AND 70) THEN
                    RAISE NOTICE 'The mother_name attribute must have between 1 and 70 characters';
                    RETURN NULL;
                ELSIF (SELECT LENGTH(NEW.medical_record) NOT BETWEEN 1 AND 15) THEN
                    RAISE NOTICE 'The medical record must have between 1 and 15 characters';
                    RETURN NULL;
                END IF;
                
                -- Check for gender in gender enum:
                IF((NEW.gender <> 'M') AND (NEW.gender <> 'F') AND (NEW.gender <> 'O')) THEN
                    RAISE NOTICE 'The gender attribute must be one of the following characters: M, F, O';
                    RETURN NULL;
                END IF;
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_patients_constraints_before_insert_on_patients BEFORE INSERT ON \"patients\"
            FOR EACH ROW EXECUTE PROCEDURE verify_patient_constraints();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_patient_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_patients_constraints_before_insert_on_patients ON patients");
    }
}
