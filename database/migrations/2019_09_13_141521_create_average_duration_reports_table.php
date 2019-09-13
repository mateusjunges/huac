<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateAverageDurationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
       
            CREATE OR REPLACE VIEW average_duration_report_view AS
            SELECT procedures.name, 
                (
                    DATE_PART('day', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp) * 24
                    + (DATE_PART('hour', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp))
                    + (DATE_PART('minute', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp) / 60)
                    + (DATE_PART('second', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp) / 3600)
                ) as average_duration,
                procedures.id as procedure_id
                from events
                inner join surgeries on surgeries.id = events.surgery_id
                inner join procedures on procedures.id = surgeries.procedure_id
                WHERE 
                 (
                    DATE_PART('day', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp) * 24
                    + (DATE_PART('hour', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp))
                    + (DATE_PART('minute', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp) / 60)
                    + (DATE_PART('second', events.surgeon_ended_at::timestamp - events.surgeon_started_at::timestamp) / 3600)
                )
                IS NOT NULL;
        
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS average_duration_report_view");
    }
}
