<?php

namespace HUAC\Http\Controllers\Patients;

use HUAC\Models\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PatientSurgeryController
{
    /**
     * @param Patient $patient
     * @return Factory|View
     */
    public function __invoke(Patient $patient)
    {
        if (Gate::denies('patients.surgeries')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('patients.surgeries.index')->with([
            'patient' => $patient
        ]);
    }
}
