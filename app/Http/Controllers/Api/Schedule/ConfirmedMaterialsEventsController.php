<?php

namespace HUAC\Http\Controllers\Api\Schedule;

use HUAC\Enums\Status;
use HUAC\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfirmedMaterialsEventsController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $events = Event::confirmedMaterials()
            ->select('id', 'start_at as start', 'end_at as end', 'color', 'title', 'surgery_id')
            ->get()->filter(function ($event) {
                return in_array($event->surgery->latestStatus->status_id, $this->allowedStatus());
            });

        return response()->json([
            'data' => [
                'events' => $events,
            ]
        ], Response::HTTP_OK);
    }

    /**
     * @return array
     */
    private function allowedStatus()
    {
        return [
            Status::PATIENT_AT_SURGERY_CENTER,
            Status::PATIENT_AT_SURGICAL_ROOM,
            Status::TIMEOUT_DONE,
            Status::ANESTHETIC_INDUCTION,
            Status::STARTED,
            Status::FINISHED,
            Status::PATIENT_OUT_OF_SURGICAL_ROOM,
            Status::PATIENT_EXITED_REPAI,
            Status::PATIENT_AT_REPAI,
            Status::PATIENT_EXITED_REPAI,
            Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER
        ];
    }
}
