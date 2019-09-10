<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\EntranceAtSurgicalRoom;
use HUAC\Events\SurgeryCenter\SurgicalRoomExit;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SurgicalRoomController
{
    /**
     * @param Event $event
     * @return JsonResponse
     */
    public function entrance($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->entrance_at_surgical_room = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O paciente entrou na sala de cirurgia.',
                    Status::PATIENT_AT_SURGICAL_ROOM
                );

                event(new EntranceAtSurgicalRoom($event));
            });

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
    public function exit($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->exit_surgical_room = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O paciente saiu da sala de cirurgia.',
                    Status::PATIENT_OUT_OF_SURGICAL_ROOM
                );

                event(new SurgicalRoomExit($event));
            });

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
