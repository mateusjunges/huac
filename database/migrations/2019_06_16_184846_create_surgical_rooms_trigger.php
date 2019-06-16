<?php

use Illuminate\Database\Migrations\Migration;

class CreateSurgicalRoomsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE FUNCTION verify_surgical_rooms_constraints()
        RETURNS TRIGGER AS
        \$BODY\$
            DECLARE countSurgicalRooms integer := 0;
        BEGIN
            -- Check for duplicate rows:
            countSurgicalRooms := COUNT(surgical_rooms.name) FROM surgical_rooms WHERE surgical_rooms.name = NEW.name;
            IF (countSurgicalRooms > 0)
            THEN
                RAISE NOTICE 'The name \"%\" is already in use!', NEW.name;
                RETURN NULL;
            END IF;
        
            -- Check for null columns:
            IF (NEW.name IS NULL)
            THEN
                RAISE NOTICE 'The \"name\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.morning_reservation_starts_at IS NULL)
            THEN
                RAISE NOTICE 'The \"morning_reservation_starts_at\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.morning_reservation_ends_at IS NULL)
            THEN
                RAISE NOTICE 'The \"morning_reservation_ends_at\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.afternoon_reservation_starts_at IS NULL)
            THEN
                RAISE NOTICE 'The \"afternoon_reservation_starts_at\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.afternoon_reservation_ends_at IS NULL)
            THEN
                RAISE NOTICE 'The \"afternoon_reservation_ends_at\" attribute is required!';
                RETURN NULL;
            END IF;
        
            -- Check for string length:
            IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 70)
            THEN
                RAISE NOTICE 'The name attribute must have between 1 and 15 characters!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.morning_reservation_starts_at) <> 8)
            THEN
                RAISE NOTICE 'The \"morning_reservation_starts_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.morning_reservation_ends_at) <> 8)
            THEN
                RAISE NOTICE 'The \"morning_reservation_ends_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.afternoon_reservation_starts_at) <> 8)
            THEN
                RAISE NOTICE 'The \"afternon_reservation_starts_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.afternoon_reservation_ends_at) <> 8)
            THEN
                RAISE NOTICE 'The \"afternon_reservation_ends_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            END IF;
            RETURN NEW;
        END;
        \$BODY\$
        LANGUAGE plpgsql;
        ");

        DB::statement("
        CREATE OR REPLACE FUNCTION verify_surgical_rooms_constraints_for_update()
        RETURNS TRIGGER AS
        \$BODY\$
            DECLARE countSurgicalRooms integer := 0;
        BEGIN
            -- Check for duplicate rows:
            countSurgicalRooms := COUNT(surgical_rooms.name) FROM surgical_rooms WHERE surgical_rooms.name = NEW.name
                        AND surgical_rooms.id <> OLD.id;
            IF (countSurgicalRooms > 0)
            THEN
                RAISE NOTICE 'The name \"%\" is already in use!', NEW.name;
                RETURN NULL;
            END IF;
        
            -- Check for null columns:
            IF (NEW.name IS NULL)
            THEN
                RAISE NOTICE 'The \"name\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.morning_reservation_starts_at IS NULL)
            THEN
                RAISE NOTICE 'The \"morning_reservation_starts_at\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.morning_reservation_ends_at IS NULL)
            THEN
                RAISE NOTICE 'The \"morning_reservation_ends_at\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.afternoon_reservation_starts_at IS NULL)
            THEN
                RAISE NOTICE 'The \"afternoon_reservation_starts_at\" attribute is required!';
                RETURN NULL;
            ELSIF (NEW.afternoon_reservation_ends_at IS NULL)
            THEN
                RAISE NOTICE 'The \"afternoon_reservation_ends_at\" attribute is required!';
                RETURN NULL;
            END IF;
        
            -- Check for string length:
            IF (SELECT LENGTH(NEW.name) NOT BETWEEN 1 AND 70)
            THEN
                RAISE NOTICE 'The name attribute must have between 1 and 15 characters!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.morning_reservation_starts_at) <> 8)
            THEN
                RAISE NOTICE 'The \"morning_reservation_starts_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.morning_reservation_ends_at) <> 8)
            THEN
                RAISE NOTICE 'The \"morning_reservation_ends_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.afternoon_reservation_starts_at) <> 8)
            THEN
                RAISE NOTICE 'The \"afternon_reservation_starts_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            ELSIF (SELECT LENGTH(NEW.afternoon_reservation_ends_at) <> 8)
            THEN
                RAISE NOTICE 'The \"afternon_reservation_ends_at\" must have exactly 8 characters, like 00:00:00!';
                RETURN NULL;
            END IF;
            RETURN NEW;
        END;
        \$BODY\$
        LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER verify_surgical_rooms_constraints BEFORE INSERT ON \"surgical_rooms\"
            FOR EACH ROW EXECUTE PROCEDURE verify_surgical_rooms_constraints();
        ");
        DB::statement("
            CREATE TRIGGER verify_surgical_rooms_constraints_before_update BEFORE UPDATE ON \"surgical_rooms\"
            FOR EACH ROW EXECUTE PROCEDURE verify_surgical_rooms_constraints_for_update();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_surgical_rooms_constraints()");
        DB::statement("DROP TRIGGER IF EXISTS verify_surgical_rooms_constraints ON status");
        DB::statement("DROP PROCEDURE IF EXISTS verify_surgical_rooms_constraints_for_update()");
        DB::statement("DROP TRIGGER IF EXISTS verify_surgical_rooms_constraints_before_update ON status");
    }
}
