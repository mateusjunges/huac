<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyUsersConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_null_fields_on_users()
            RETURNS TRIGGER AS
            \$BODY\$
            DECLARE countUsername integer := 0;
            BEGIN
                -- Check for null columns:
                IF (NEW.email IS NULL || NEW.name IS NULL || NEW.username IS NULL)
                THEN
                    RAISE EXCEPTION 'Email, name and username are required!';
                    RETURN NULL;
                END IF;
                -- Verify if the NEW.username is unique on database:
                countUsername := COUNT(users.username) FROM users WHERE username = NEW.username;
                IF (countUsername > 0)
                THEN 
                    RAISE EXCEPTION 'Username already exists.';
                    RETURN NULL;
                END IF;
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");
        DB::statement("
            CREATE TRIGGER verify_null_columns_before_insert_on_users BEFORE INSERT ON \"users\"
            FOR EACH ROW EXECUTE PROCEDURE verify_null_fields_on_users();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_null_fields_on_users()");
        DB::statement("DROP TRIGGER IF EXISTS verify_null_columns_before_insert_on_users ON users");
    }
}
