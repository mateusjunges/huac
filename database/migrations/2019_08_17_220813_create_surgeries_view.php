<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeriesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW show_surgeries AS
            SELECT surgeries.id as surgery_id, patients.name as patient_name, patients.id as patient_id, patients.medical_record as medical_record,
                users.name as head_surgeon_name, status.name as status_name, status.id as status_id, 
                procedures.name as procedure_name, procedures.id as procedure_id,
                surgeon_has_surgeries.surgeon_id as head_surgeon_id,
                to_char(events.start_at, 'dd/mm/yyyy HH24:MI') as scheduling
                FROM surgeries
                    INNER JOIN patients ON patients.id = surgeries.patient_id
                    INNER JOIN procedures ON procedures.id = surgeries.procedure_id
                    INNER JOIN surgeon_has_surgeries ON surgeon_has_surgeries.surgery_id = surgeries.id
                    INNER JOIN surgeons ON surgeons.id = surgeon_has_surgeries.surgeon_id
                    INNER JOIN users ON users.id = surgeons.user_id
                    INNER JOIN status ON status.id = (
                        SELECT status_id FROM logs
                        WHERE surgery_id = surgeries.id
                        ORDER BY logs.created_at DESC
                        LIMIT 1
                    )
                    LEFT JOIN events ON events.surgery_id = surgeries.id
                    WHERE surgeon_has_surgeries.head_surgeon = true
                    AND surgeries.deleted_at IS NULL
                    AND users.deleted_at IS NULL
                    AND surgeons.deleted_at IS NULL
                    AND patients.deleted_at IS NULL
                    AND surgeon_has_surgeries.deleted_at IS NULL
                    AND procedures.deleted_at IS NULL
                    AND events.deleted_at IS NULL
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS show_surgeries");
    }
}
