<?php

namespace HUAC\Http\Controllers\Api\Scheduling;

use Carbon\Carbon;
use HUAC\Actions\VerifyExistingSchedulesWithConfirmedMaterialsAtRoom;
use HUAC\Models\Event;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyExistingSchedulesBeforeUpdateWithConfirmedMaterials
{
    public function __invoke(Request $request)
    {
        $room = $request->input('room');
        $start = $request->input('start');
        $end = $request->input('end');
        $event = $request->input('event');

        $event = Event::find($event);

        $surgery = $event->surgery()->first();

        $start = str_replace('T', ' ', $start);
        $end = str_replace('T', ' ', $end);
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);

        $events_at_same_time = VerifyExistingSchedulesWithConfirmedMaterialsAtRoom::execute(
            $room, $start, $end, $surgery->id
        );

        return response()->json([
            'data' => [
                'events_at_same_time' => $events_at_same_time,
            ]
        ], Response::HTTP_OK);
    }
}
