<?php

namespace HUAC\Http\Controllers\Patients;

use HUAC\Models\Patient;

class PatientSurgeryController
{
    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Patient $patient)
    {
        return view('patients.surgeries.index')->with([
            'patient' => $patient
        ]);
    }
}
