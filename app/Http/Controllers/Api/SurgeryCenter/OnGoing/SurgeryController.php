<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\SurgeryFinished;
use HUAC\Events\SurgeryCenter\SurgeryStarted;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SurgeryController
{
    /**
     * @param Event $event
     * @return JsonResponse
     */
    public function start($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->surgeon_started_at = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'A cirurgia foi iniciada!',
                    Status::STARTED
                );

                event(new SurgeryStarted($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Cirurgia iniciada!',
                        'timer' => 1000,
                    ],
                    'event' => $event
                ]
            ], Response::HTTP_OK);

        } catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado! Tente novamente mais tarde.',
                        'timer' => 1000,
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
    public function finish($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->surgeon_ended_at = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'A cirurgia foi finalizada!',
                    Status::FINISHED
                );

                event(new SurgeryFinished($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Cirurgia finalizada!',
                        'timer' => 1000,
                    ],
                    'event' => $event
                ]
            ], Response::HTTP_OK);

        } catch (Exception $exception) {
            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'error',
                        'title' => 'Ops...',
                        'text' => 'Algo deu errado! Tente novamente mais tarde.',
                        'timer' => 1000,
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
