<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Events\SurgeryCenter\EntranceAtSurgeryCenter;
use HUAC\Events\SurgeryCenter\SurgicalCenterExit;
use HUAC\Models\Event;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SurgeryCenterController
{
    /**
     * @param Event $event
     * @return JsonResponse
     */
    public function entrance(Event $event)
    {
        try {
            $event->entrance_at_surgical_center = Carbon::now();
            $event->save();

            event(new EntranceAtSurgeryCenter($event));

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Entrada no centro cirúrgico confirmada!',
                        'timer' => 5000,
                    ],
                    'event' => $event
                ]
            ], Response::HTTP_OK);

        }catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado! Tente novamente mais tarde.',
                        'timer' => 5000,
                    ],
                    'exception' => [
                        'code' => $exception->getCode(),
                        'message' => $exception->getMessage(),
                        'line' => $exception->getLine(),
                        'trace' => $exception->getTrace()
                    ]
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Event $event
     * @return JsonResponse
     */
    public function exit(Event $event)
    {
        try {
            $event->exit_surgery_center = Carbon::now();
            $event->save();

            event(new SurgicalCenterExit($event));

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Saída do centro cirúrgico confirmada!',
                        'timer' => 5000,
                    ],
                    'event' => $event
                ]
            ], Response::HTTP_OK);

        }catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado! Tente novamente mais tarde.',
                        'timer' => 5000,
                    ],
                    'exception' => [
                        'code' => $exception->getCode(),
                        'message' => $exception->getMessage(),
                        'line' => $exception->getLine(),
                        'trace' => $exception->getTrace()
                    ]
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
