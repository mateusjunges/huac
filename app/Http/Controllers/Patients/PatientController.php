<?php

namespace HUAC\Http\Controllers\Patients;

use HUAC\Http\Requests\PatientRequest;
use HUAC\Models\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PatientController
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        if (Gate::denies('patients.index')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        return view('patients.index');
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        if (Gate::denies('patients.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        return view('patients.create');
    }

    /***
     * @param PatientRequest $request
     * @return RedirectResponse
     */
    public function store(PatientRequest $request)
    {
        try {
            if (Gate::denies('patients.create')) {
                $message = array(
                    'title' => 'Acesso negado!',
                    'text' => 'Você não possui permissão para acessar esta área do sistema!',
                    'type' => 'warning',
                );
                session()->flash('message', $message);
                return redirect()->back();
            }

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
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * @param Patient $patient
     * @return Factory|View
     */
    public function edit(Patient $patient)
    {
        if (Gate::denies('patients.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('patients.edit')->with([
            'patient' => $patient,
        ]);
    }

    /**
     * @param PatientRequest $request
     * @param Patient $patient
     * @return RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        try {
            if (Gate::denies('patients.update')) {
                $message = array(
                    'title' => 'Acesso negado!',
                    'text' => 'Você não possui permissão para acessar esta área do sistema!',
                    'type' => 'warning',
                );
                session()->flash('message', $message);
                return redirect()->back();
            }
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
