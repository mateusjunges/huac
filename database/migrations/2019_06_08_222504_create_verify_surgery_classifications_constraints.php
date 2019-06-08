<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateVerifySurgeryClassificationsConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_surgery_classifications_constraints()
            RETURNS TRIGGER AS 
            \$BODY\$
            BEGIN
                -- Check for null columns:
                IF (NEW.name IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"name\" attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.description IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"description\" attribute is required!';
                    RETURN NULL;
                END IF;
                
                -- Check for string length:
                IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 20)
                THEN
                    RAISE EXCEPTION 'The \"name\" must have between 1 and 20 characters!';
                    RETURN NULL;
                END IF;
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_surgery_classifications_constraints BEFORE INSERT ON surgery_classifications
            FOR EACH ROW EXECUTE PROCEDURE verify_surgery_classifications_constraints();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_surgery_classifications_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_surgery_classifications_constraints ON status");
    }
}
