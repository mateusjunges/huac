<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use Exception;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\EntranceAtSurgeryCenter;
use HUAC\Events\SurgeryCenter\SurgicalCenterExit;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SurgeryCenterController
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
                $event->entrance_at_surgical_center = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O paciente entrou no centro cirúrgico',
                    Status::PATIENT_AT_SURGERY_CENTER
                );

                event(new EntranceAtSurgeryCenter($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Entrada no centro cirúrgico confirmada!',
                        'timer' => 1000,
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
    public function exit($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->exit_surgery_center = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'O paciente saiu do centro cirúrgico.',
                    Status::PATIENT_EXITED_SURGERY_CENTER
                );

                event(new SurgicalCenterExit($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Saída do centro cirúrgico confirmada!',
                        'timer' => 1000,
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
