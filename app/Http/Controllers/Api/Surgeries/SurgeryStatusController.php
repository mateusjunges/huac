<?php

namespace HUAC\Http\Controllers\Api\Surgeries;

use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SurgeryStatusController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            if (Gate::denies('surgeries.update-status')) {
                return response()->json([
                    'data' => [
                        'swal' => [
                            'icon' => 'warning',
                            'title' => 'Acesso negado!',
                            'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                            'timer' => 1000,
                        ]
                    ]
                ], Response::HTTP_UNAUTHORIZED);
            }

            $event = Event::find($request->input('event_id'));
            $surgery = $event->surgery;

            Log::createFor($surgery, 'Status alterado.', $request->input('status'));

            return response()->json([
               'data' => [
                   'swal' => [
                       'icon'  => 'success',
                       'title' => 'Sucesso!',
                       'text'  => 'Status alterado com sucesso!',
                       'timer' => 1000
                   ],
                   'event' => $event,
                   'surgery' => $surgery,
               ],
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon'  => 'error',
                        'title' => 'Ops...',
                        'text'  => 'Algo deu errado, entre em contato com o administrador do sistema!',
                        'timer' => 1000
                    ],
                    'exception' => [
                        'code'    => $exception->getCode(),
                        'message' => $exception->getMessage(),
                        'line'    => $exception->getLine(),
                    ],
                ],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
