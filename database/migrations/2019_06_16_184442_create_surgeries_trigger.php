<?php

use Illuminate\Database\Migrations\Migration;

class CreateSurgeriesTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_surgeries_constraints()
            RETURNS TRIGGER AS
            \$BODY\$
            BEGIN
                -- Check for null columns:
                IF (NEW.estimated_duration_time IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"estimated_duration_time\" attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.materials IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"materials\" column is required!';
                    RETURN NULL;
                ELSIF (NEW.procedure_id IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"procedure_id\" attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.surgery_classification_id IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"surgery_classification_id\" attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.patient_id IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"patient_id\" attribute is required!';
                    RETURN NULL;
                END IF;
                
                -- Check for string length:
                IF (SELECT LENGTH(NEW.materials) < 10)
                THEN
                    RAISE EXCEPTION 'The \"materials\" must have at least 10 characters!';
                    RETURN NULL;
                END IF;
                
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_surgeries_constraints BEFORE INSERT ON surgeries
            FOR EACH ROW EXECUTE PROCEDURE verify_surgeries_constraints();
        ");
        DB::statement("
            CREATE TRIGGER verify_surgeries_constraints_before_update BEFORE UPDATE ON surgeries
            FOR EACH ROW EXECUTE PROCEDURE verify_surgeries_constraints();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_surgeries_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_surgeries_constraints ON status");
        DB::statement("DROP TRIGGER IF EXISTS verify_surgeries_constraints_before_update ON status");
    }
}
