<?php

namespace HUAC\Http\Controllers\Patients;

use Illuminate\Http\Request;

class PatientController
{
    public function index()
    {
        return view('patients.index');
    }
}
