<?php

namespace HUAC\Http\Controllers\Api\Patients\Surgeries;

use HUAC\Enums\Status;
use HUAC\Events\SurgeryDeletedEvent;
use HUAC\Models\Log;
use HUAC\Models\Surgery;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DeletePatientSurgeryController
{
    /**
     * @param Surgery $surgery
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function __invoke(Surgery $surgery)
    {
        if (Gate::denies('surgeries.cancel')) {
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

        $surgery->events()->delete();

        Log::createFor($surgery, 'Cirurgia cancelada.', Status::CANCELED);

        event(new SurgeryDeletedEvent($surgery));

        $surgery->delete();

        return response()->json([
            'data' => [
                'swal' => [
                    'icon'  => 'success',
                    'title' => 'Sucesso!',
                    'text'  => 'Cirurgia cancelada com sucesso!',
                    'timer' => 5000,
                ]
            ]
        ], Response::HTTP_OK);
    }
}
