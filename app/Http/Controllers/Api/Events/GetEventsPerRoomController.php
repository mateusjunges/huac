<?php

namespace HUAC\Http\Controllers\Api\Events;

use Carbon\Carbon;
use HUAC\Models\Event;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetEventsPerRoomController
{
    /**
     * @param Request $request
     * @param SurgicalRoom $room
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, SurgicalRoom $room)
    {
        $start = Carbon::parse($request->input('start'));
        $end = Carbon::parse($request->input('end'));

        $events = Event::room($room->id)
            ->where('start_at', '>=', $start->subWeek())
            ->where('end_at', '<=', $end->addWeek())
            ->select('id', 'start_at as start', 'end_at as end', 'color', 'title', 'surgery_id')->get();

        return response()->json([
            'data' => [
                'events' => $events,
            ]
        ], Response::HTTP_OK);
    }
}
