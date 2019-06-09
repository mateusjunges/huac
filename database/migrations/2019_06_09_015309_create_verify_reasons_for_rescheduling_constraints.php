<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyReasonsForReschedulingConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_reasons_for_rescheduling_constraints()
            RETURNS TRIGGER AS
            \$BODY\$
            DECLARE countReasonsForRescheduling integer := 0;
            BEGIN
                -- Check for null columns:
                IF (SELECT NEW.name IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"name\" attribute is required!';
                    RETURN NULL;
                END IF;
                -- Check for duplicate rows:
                countReasonsForRescheduling := COUNT(*) FROM reasons_for_rescheduling
                    WHERE reasons_for_rescheduling.name = NEW.name;
                IF (countReasonsForRescheduling > 0)
                THEN
                    RAISE EXCEPTION 'The given \"name\" is already registered!';
                    RETURN NULL;
                END IF;
                
                -- Check for string length:
                IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 70)
                THEN
                    RAISE EXCEPTION 'The \"name\" attribute must have between 1 and 70 characters!';
                    RETURN NULL;
                END IF;
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_reasons_for_rescheduling_constraints BEFORE INSERT ON reasons_for_rescheduling
            FOR EACH ROW EXECUTE PROCEDURE verify_reasons_for_rescheduling_constraints();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_reasons_for_rescheduling_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_reasons_for_rescheduling_constraints ON status");
    }
}
