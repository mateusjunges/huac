<?php

namespace HUAC\Http\Controllers\Api\Patients;

use HUAC\Models\Patient;
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
