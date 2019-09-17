<?php

namespace HUAC\Http\Controllers\Api\Patients;

use HUAC\Models\Patient;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PatientsController
{
    /**
     * @param Patient $patient
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Patient $patient)
    {
        if (Gate::denies('patients.delete')) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'warning',
                        'title' => 'Acesso negado!',
                        'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                        'timer' => 5000,
                    ]
                ]
            ], Response::HTTP_UNAUTHORIZED);
        }

        $surgeries = $patient->surgeries()->get();
        foreach ($surgeries as $surgery) {
            $surgery->events()->delete();
        }
        $patient->surgeries()->delete();
        $patient->delete();

        return response()->json([
            'data' => [
                'swal' => [
                    'icon'  => 'success',
                    'title' => 'Sucesso!',
                    'text'  => 'Paciente removido com sucesso!',
                    'timer' => 5000
                ]
            ]
        ], Response::HTTP_OK);
    }
}
