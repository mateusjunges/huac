<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use HUAC\Enums\Status;
use HUAC\Events\SurgeryCenter\AnestheticInduction;
use HUAC\Models\Event;
use HUAC\Models\Log;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class AnestheticInductionController
{
    /**
     * @param $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($event)
    {
        try {
            DB::transaction(function () use ($event) {
                $event = Event::find($event);
                $event->anesthetic_induction = Carbon::now();
                $event->save();

                Log::createFor(
                    $event->surgery,
                    'Indução anestésica realizada!',
                    Status::ANESTHETIC_INDUCTION
                );

                event(new AnestheticInduction($event));
            });

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Indução anestésica confirmada!',
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
