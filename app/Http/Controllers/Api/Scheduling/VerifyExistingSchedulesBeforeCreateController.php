<?php

namespace HUAC\Http\Controllers\Api\Scheduling;

use Carbon\Carbon;
use HUAC\Actions\VerifyExistingSchedulesAtRoom;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyExistingSchedulesBeforeCreateController
{
    public function __invoke(Request $request)
    {
        $room = $request->input('room');
        $start = $request->input('start');
        $end = $request->input('end');
        $surgery_id = $request->input('surgery_id');
        $estimated_duration = $request->input('estimated_duration');

        $start = str_replace('T', ' ', $start);
        $end = str_replace('T', ' ', $end);
        $start = Carbon::parse($start);
        $end = Carbon::parse($end)->addHours($estimated_duration);

        $events_at_same_time = VerifyExistingSchedulesAtRoom::execute($room, $start, $end, $surgery_id);

        return response()->json([
            'data' => [
                'events_at_same_time' => $events_at_same_time,
            ]
        ], Response::HTTP_OK);
    }
}
