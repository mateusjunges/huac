<?php

namespace HUAC\Http\Controllers\Patients;

use HUAC\Http\Requests\PatientRequest;
use HUAC\Models\Patient;

class PatientController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('patients.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('patients.create');
    }

    /***
     * @param PatientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientRequest $request)
    {
        try {
            Patient::create($request->all());

            $message = array(
                'title' => 'Sucesso!',
                'text'  => 'Paciente cadastrado com sucesso!',
                'type'  => 'success'
            );

            session()->flash('message', $message);

            return redirect()->route('patients.index');
        } catch (\Exception $exception) {
            $message = array(
                'title' => 'Ops!',
                'text'  => 'Ocorreu um erro em nosso servidor. Entre em contato com o administrador do sistema!',
                'type'  => 'danger'
            );

            session()->flash('message', $message);
        }
    }

    /**
     * @param Patient $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit')->with([
            'patient' => $patient,
        ]);
    }

    /**
     * @param PatientRequest $request
     * @param Patient $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        try {
            $patient->update($request->all());
            $patient->save();

            $message = array(
                'title' => 'Sucesso!',
                'type'  => 'success',
                'text'  => 'Paciente atualizado com sucesso!',
            );

            session()->flash('message', $message);

            return redirect()->route('patients.index');
        }catch (\Exception $exception) {
            $message = array(
                'title' => 'Ops...',
                'type'  => 'danger',
                'text'  => 'Ocorreu um erro em nosso servidor. Entre em contato com o administrador do sistema!',
            );

            session()->flash('message', $message);

            return redirect()->back();
        }
    }
}
