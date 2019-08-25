<?php

namespace HUAC\Http\Controllers\Api\Events;

use HUAC\Models\Event;
use HUAC\Models\Status;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventDetailsController
{
    /**
     * @param Request $request
     * @param Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, Event $event)
    {
        $surgery = $event->surgery()->first();
        $head_surgeon = $surgery->headSurgeon()->first()->name;
        $assistant_surgeon = $surgery->assistantSurgeon()->first();
        $assistant_surgeon = $assistant_surgeon != null ? $assistant_surgeon->name : 'Não cadastrado.';
        $anesthetics = $surgery->anesthetics()->get();
        $procedure = $surgery->procedure()->first();
        $patient = $surgery->patient()->first();
        $status = Status::find($surgery->latestStatus()->first()->status_id);

        return response()->json([
            'data' => [
                'event'             => $event,
                'head_surgeon'      => $head_surgeon,
                'assistant_surgeon' => $assistant_surgeon,
                'anesthetics'       => $anesthetics,
                'procedure'         => $procedure,
                'patient'           => $patient,
                'status'            => $status,
                'surgery'           => $surgery,
            ]
        ], Response::HTTP_OK);
    }
}
