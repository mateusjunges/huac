<?php

use Illuminate\Database\Migrations\Migration;

class CreateStatusTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_status_constraints()
            RETURNS TRIGGER AS 
            \$BODY\$
                DECLARE countStatus integer := 0;
            BEGIN
                -- Check for duplicate rows:
                countStatus := COUNT(status.*) FROM status WHERE status.name = NEW.name;
                IF (countStatus > 0)
                THEN 
                    RAISE EXCEPTION 'The given \"name\" is already in use!';
                    RETURN NULL;
                END IF;
                
                -- Check for required columns:
                IF(NEW.name IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"name\" attribute is required!';
                    RETURN NULL;
                ELSIF (NEW.description IS NULL)
                THEN
                    RAISE EXCEPTION 'The \"description\" attribute is required!';
                    RETURN NULL;
                END IF;
                
                -- Check for string length:
                IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 60)
                THEN 
                    RAISE EXCEPTION 'The \"name\" attribute must have between 1 and 60 characters';
                    RETURN NULL;
                ELSIF (SELECT LENGTH(NEW.description) <= 5)
                THEN
                    RAISE EXCEPTION 'The \"description\" must have more than 5 characters!';
                    RETURN NULL;
                END IF;
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");

        DB::statement("
        CREATE OR REPLACE FUNCTION verify_status_constraints_for_update()
        RETURNS TRIGGER AS
        \$BODY\$
            DECLARE countStatus integer := 0;
        BEGIN
            -- Check for duplicate rows:
            countStatus := COUNT(status.*) FROM status WHERE status.name = NEW.name AND status.id <> OLD.id;
            IF (countStatus > 0)
            THEN
                RAISE NOTICE 'The given name is already in use!';
                RETURN NULL;
            END IF;
        
            -- Check for required columns:
            IF(NEW.name IS NULL)
            THEN
                RAISE NOTICE 'The name attribute is required!';
                RETURN NULL;
            ELSIF (NEW.description IS NULL)
            THEN
                RAISE NOTICE 'The description attribute is required!';
                RETURN NULL;
            END IF;
        
            -- Check for string length:
            IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 60)
            THEN
                RAISE NOTICE 'The name must have between 1 and 60 characters';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.description) <= 5)
            THEN
                RAISE NOTICE 'The description must have more than 5 characters!';
                RETURN NULL;
            END IF;
            RETURN NEW;
        END;
        \$BODY\$
        LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER verify_status_constraints_before_insert_on_status BEFORE INSERT ON \"status\"
            FOR EACH ROW EXECUTE PROCEDURE verify_status_constraints();
        ");
        DB::statement("
            CREATE TRIGGER verify_status_constraints_before_update_on_status BEFORE UPDATE ON \"status\"
            FOR EACH ROW EXECUTE PROCEDURE verify_status_constraints_for_update();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_status_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_status_constraints_before_insert_on_status ON surgeons");
        DB::statement("DROP PROCEDURE IF EXISTS verify_status_constraints_for_update()");
        DB::statement("DROP TRIGGER IF EXISTS verify_status_constraints_before_update_on_status ON surgeons");
    }
}
