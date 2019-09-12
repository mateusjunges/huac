<?php

namespace HUAC\Http\Controllers\Api\Schedule;

use Carbon\Carbon;
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
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        $_events = Event::confirmedMaterials()
            ->where('start_at', '>=', $start->subWeek())
            ->where('end_at', '<=', $end->addWeek())
            ->select('id', 'start_at as start', 'end_at as end', 'color', 'title', 'surgery_id')
            ->get();
        $events = null;

        foreach ($_events as $event) {
            if (
                $event->surgery->latestStatus->status_id === Status::PATIENT_AT_SURGERY_CENTER or
                $event->surgery->latestStatus->status_id === Status::PATIENT_AT_SURGICAL_ROOM or
                $event->surgery->latestStatus->status_id === Status::TIMEOUT_DONE or
                $event->surgery->latestStatus->status_id === Status::ANESTHETIC_INDUCTION or
                $event->surgery->latestStatus->status_id === Status::STARTED or
                $event->surgery->latestStatus->status_id === Status::FINISHED or
                $event->surgery->latestStatus->status_id === Status::PATIENT_OUT_OF_SURGICAL_ROOM or
                $event->surgery->latestStatus->status_id === Status::PATIENT_EXITED_REPAI or
                $event->surgery->latestStatus->status_id === Status::PATIENT_AT_REPAI or
                $event->surgery->latestStatus->status_id === Status::PATIENT_EXITED_REPAI or
                $event->surgery->latestStatus->status_id === Status::MATERIALS_CONFIRMED_BY_SURGERY_CENTER
            )
                $events[] = $event;
        }

        return response()->json([
            'data' => [
                'events' => $events,
            ]
        ], Response::HTTP_OK);
    }
}
