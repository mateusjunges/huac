<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyAnestheticsConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_anesthetics_constraints()
            RETURNS TRIGGER AS
            \$BODY\$
            BEGIN
                -- Check for null columns:
                IF (NEW.name IS NULL)
                THEN 
                    RAISE EXCEPTION 'The \"name\" attribute is required!';
                    RETURN NULL;
                END IF;
                
                -- Check for string length:
                IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 60)
                THEN
                    RAISE EXCEPTION 'The \"name\" attribute must have between 1 and 60 characters!';
                    RETURN NULL;
                END IF;
                
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_anesthetics_constraints BEFORE INSERT ON anesthetics
            FOR EACH ROW EXECUTE PROCEDURE verify_anesthetics_constraints();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_anesthetics_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_anesthetics_constraints ON status");
    }
}
