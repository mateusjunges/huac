<?php

use Illuminate\Database\Migrations\Migration;

class CreateVerifyProcedureConstraintsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("
            CREATE OR REPLACE FUNCTION verify_procedure_constraints()
            RETURNS TRIGGER AS
            \$BODY\$
                DECLARE stringLength integer := 0;
                DECLARE countProcedures integer := 0;
            BEGIN
                -- Check for null columns:
                IF (NEW.name IS NULL || NEW.sus_code IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"name\" and \"sus_code\" attributes are required';
                    RETURN NULL;
                END IF;
                
                -- Check for max string length:
                stringLength := LENGTH(NEW.name);
                IF (stringLength NOT BETWEEN 1 AND 60)
                THEN
                    RAISE EXCEPTION 'The \"name\" column length must be between 1 and 60 characters!';
                    RETURN NULL;
                END IF;
                stringLength := 0;
                stringLength := LENGTH(NEW.sus_code);
                IF(stringLength NOT BETWEEN 1 AND 20)
                THEN
                    RAISE EXCEPTION 'The \"sus_code\" column length must be between 1 and 20 characters!';
                    RETURN NULL;
                END IF;
                
                -- Check for duplicate rows:
                countProcedures := COUNT(procedures.*) FROM procedures WHERE procedures.sus_code = NEW.sus_code;
                IF(countProcedures > 0)
                THEN
                    RAISE EXCEPTION 'The supplied \"sus_code\" is already registered.';
                    RETURN NULL;
                END IF;
                
                RETURN NEW;
            END;
            \$BODY\$
            
            LANGUAGE plpgsql;
       ");
       DB::statement("
            CREATE TRIGGER verify_procedure_constraints_before_insert_on_procedures BEFORE INSERT ON \"procedures\"
            FOR EACH ROW EXECUTE PROCEDURE verify_procedure_constraints();
       ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_procedure_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_procedure_constraints_before_insert_on_procedures ON users");
    }
}
