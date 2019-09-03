<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use Carbon\Carbon;
use HUAC\Events\SurgeryCenter\AnestheticInduction;
use HUAC\Models\Event;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class AnestheticInductionController
{
    /**
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Event $event)
    {
        try {
            $event->anesthetic_induction = Carbon::now();
            $event->save();

            event(new AnestheticInduction($event));

            return response()->json([
                'data' => [
                    'swal' => [
                        'icon' => 'success',
                        'title' => 'Sucesso!',
                        'text' => 'Indução anestésica confirmada!',
                        'timer' => 5000,
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
