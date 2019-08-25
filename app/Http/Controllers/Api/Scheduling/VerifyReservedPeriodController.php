<?php

namespace HUAC\Http\Controllers\Api\Scheduling;

use Carbon\Carbon;
use HUAC\Actions\VerifyReservedPeriodBeforeUpdate;
use HUAC\Models\Event;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyReservedPeriodController
{
    public function beforeStore()
    {

    }

    public function beforeUpdate(Request $request)
    {
        $room = SurgicalRoom::find($request->input('room'));

        $start = str_replace('T', ' ', $request->input('event.start'));
        $end   = str_replace('T', ' ', $request->input('event.end'));

        $start = Carbon::parse(Carbon::parse($start)->format('H:i:s'));
        $end = Carbon::parse(Carbon::parse($end)->format('H:i:s'));

        $reserved =  VerifyReservedPeriodBeforeUpdate::execute($room, $start, $end);

        return response()->json([
            'data' => [
                'reserved_period' => $reserved,
            ]
        ], Response::HTTP_OK);

    }
}
