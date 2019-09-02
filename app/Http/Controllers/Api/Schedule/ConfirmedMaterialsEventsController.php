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
//                if ($event->surgery->latestStatus->status_id === Status::MATERIALS_CONFIRMED_SURGERY_CENTER) {
//                }
                return $event->surgery->latestStatus->status_id === Status::MATERIALS_CONFIRMED_SURGERY_CENTER;
            });

        return response()->json([
            'data' => [
                'events' => $events,
            ]
        ], Response::HTTP_OK);
    }
}