<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifySurgeonAvailabilityTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE OR REPLACE FUNCTION verify_if_surgeon_is_available()
            RETURNS trigger AS 
            \$BODY\$
            DECLARE busySurgeons integer;
            BEGIN
                SELECT count(DISTINCT surgeon_has_surgeries.surgeon_id) INTO busySurgeons
                        FROM events 
                        inner join surgeon_has_surgeries ON surgeon_has_surgeries.surgery_id = 1
                        AND surgeon_has_surgeries.surgeon_id IN (
                            SELECT surgeon_has_surgeries.surgeon_id FROM surgeon_has_surgeries WHERE surgery_id = 1
                        )	
                        WHERE (events.start_at::timestamp BETWEEN NEW.start_at::timestamp AND NEW.end_at::timestamp 
                              OR events.end_at::timestamp BETWEEN NEW.start_at::timestamp AND NEW.end_at::timestamp);
                    
                IF(busySurgeons > 0)
                THEN
                    RAISE NOTICE 'One of the surgeons are busy at the desired scheduling period. Please, check and try again';
                    RETURN NULL;
                END IF;
                    -- If the surgeons of the surgery are not busy, the insertion can be finished.
                RETURN NEW;
            END;
            \$BODY\$
            LANGUAGE plpgsql;
        ");

        DB::statement("
            CREATE TRIGGER verify_if_surgeon_is_available BEFORE INSERT ON \"events\"
            FOR EACH ROW EXECUTE PROCEDURE verify_if_surgeon_is_available();
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP PROCEDURE IF EXISTS verify_if_surgeon_is_available()");
        DB::statement("DROP TRIGGER IF EXISTS verify_if_surgeon_is_available ON events");
    }
}
