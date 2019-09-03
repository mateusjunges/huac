<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Events\SurgeryCenter\EntranceAtSurgicalRoom;
use HUAC\Events\SurgeryCenter\SurgicalRoomExit;
use HUAC\Models\Event;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SurgicalRoomController
{
    /**
     * @param Event $event
     * @return JsonResponse
     */
    public function entrance(Event $event)
    {
        try {
            $event->entrance_at_surgical_room = Carbon::now();
            $event->save();

            event(new EntranceAtSurgicalRoom($event));

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Cirurgia iniciada!',
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
            $event->exit_surgical_room = Carbon::now();
            $event->save();

            event(new SurgicalRoomExit($event));

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Cirurgia iniciada!',
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
