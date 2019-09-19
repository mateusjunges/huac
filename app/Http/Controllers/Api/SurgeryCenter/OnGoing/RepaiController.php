<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\EntranceAtRepai;
use HUAC\Events\SurgeryCenter\ExitOfRepai;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RepaiController
{
    /**
     * @param $event
     * @return JsonResponse
     */
    public function entrance($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->entrance_repai = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O paciente entrou na REPAI',
                    Status::PATIENT_AT_REPAI
                );

                event(new EntranceAtRepai($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Entrada na REPAI confirmada!',
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
                $event->exit_repai = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O paciente saiu da REPAI',
                    Status::PATIENT_EXITED_REPAI
                );

                event(new ExitOfRepai($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Saída da REPAI confirmada!',
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
