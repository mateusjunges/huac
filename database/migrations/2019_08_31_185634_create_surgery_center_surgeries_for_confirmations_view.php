<?php

use HUAC\Enums\Status;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeryCenterSurgeriesForConfirmationsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $materials_confirmed_by_cme = Status::MATERIALS_CONFIRMED_BY_CME;

        DB::statement("
            CREATE OR REPLACE VIEW surgery_center_surgeries_for_confirmation_view AS
            SELECT 
                patients.name as patient_name, patients.medical_record as medical_record, surgeries.id as surgery_id,
                procedures.id as procedure_id, procedures.name as procedure_name, status.name as status_name, status.id
                as status_id, surgeries.materials as materials, to_char(events.start_at, 'dd/mm/yyyy HH24:MI') as scheduling,
                events.id as event_id
            FROM surgeries
                INNER JOIN status ON status.id = (
                    SELECT status_id FROM logs 
                    WHERE logs.surgery_id = surgeries.id
                    ORDER BY logs.created_at DESC
                    LIMIT 1
                )
                INNER JOIN patients ON patients.id = surgeries.patient_id
                INNER JOIN procedures on procedures.id = surgeries.procedure_id
                INNER JOIN events ON events.surgery_id = surgeries.id
            WHERE events.deleted_at IS NULL
                AND surgeries.deleted_at IS NULL
                AND patients.deleted_at IS NULL
                AND procedures.deleted_at IS NULL
                AND status.deleted_at IS NULL 
                AND surgeries.materials IS NOT NULL
                AND status.id =  $materials_confirmed_by_cme;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS surgery_center_surgeries_for_confirmation_view");
    }
}
