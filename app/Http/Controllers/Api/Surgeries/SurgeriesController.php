<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use HUAC\Enums\Status;
use HUAC\Events\SurgeryDeletedEvent;
use HUAC\Models\Log;
use HUAC\Models\Surgery;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SurgeriesController
{
    /**
     * @param Surgery $surgery
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Surgery $surgery)
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

        Log::createFor($surgery, 'Cirurgia cancelada', Status::CANCELED);

        $surgery->events()->delete();

        event(new SurgeryDeletedEvent($surgery));

        $surgery->delete();
        return response()->json([
            'code'  => Response::HTTP_OK,
            'timer' => 5000,
            'text'  => 'Cirurgia removida com sucesso!',
            'title' => 'Sucesso!',
            'icon'  => 'success'
        ], Response::HTTP_OK);
    }
}
