<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\TimeOutDone;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TimeoutController
{
    /**
     * @param Event $event
     * @return JsonResponse
     */
    public function __invoke($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->time_out_at = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O timeout foi realizado!',
                    Status::TIMEOUT_DONE
                );

                event(new TimeOutDone($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Timeout realizado!',
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
