<?php

use Illuminate\Database\Migrations\Migration;

class CreateVerifyUsersConstraintsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE FUNCTION verify_users_constraints()
        RETURNS TRIGGER AS
        \$BODY\$
        BEGIN
            -- Check for null columns
            IF (NEW.name IS NULL)
            THEN
                RAISE EXCEPTION 'The \"name\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.email IS NULL)
            THEN
                RAISE EXCEPTION 'The \"email\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.username IS NULL)
            THEN
                RAISE EXCEPTION 'The \"username\" attribute is required!';
                RETURN NULL;
            END IF;
            
            -- Email validation:
            IF (NEW.email NOT LIKE '%_@__%.__%')
            THEN
                RAISE EXCEPTION 'Please enter a valid email!';
                RETURN NULL;
            END IF;
            RETURN NEW;
            
            -- Check for string length:
            IF (SELECT LENGTH(NEW.name) NOT BETWEEN 3 AND 70)
            THEN
                RAISE EXCEPTION 'The \"name\" attribute must have between 3 and 70 characters!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.username) NOT BETWEEN 3 AND 30)
            THEN
                RAISE EXCEPTION 'The \"username\" must have between 3 and 30 characters!';
                RETURN NULL;
            END IF;
        END;
        \$BODY\$
        LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_users_constraints BEFORE INSERT ON users
            FOR EACH ROW EXECUTE PROCEDURE verify_users_constraints();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_users_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_users_constraints ON users");
    }
}
