<?php

namespace HUAC\Http\Controllers\Api\Scheduling;

use Carbon\Carbon;
use HUAC\Actions\VerifyReservedPeriod;
use HUAC\Models\Event;
use HUAC\Models\SurgicalRoom;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyReservedPeriodController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function beforeStore(Request $request)
    {
        $room = SurgicalRoom::find($request->input('room'));

        $start = str_replace('T', ' ', $request->input('event.start'));
        $end = str_replace('T', ' ', $request->input('event.end'));
        $duration = $request->input('event.duration');

        $start = Carbon::parse(Carbon::parse($start)->format('H:i:s'));
        $end = Carbon::parse(Carbon::parse($end)->addHours($duration)->format('H:i:s'));

        $reserved = VerifyReservedPeriod::execute($room, $start, $end);

        return response()->json([
            'data' => [
                'reserved_period' => $reserved
            ]
        ], Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function beforeUpdate(Request $request)
    {
        $room = SurgicalRoom::find($request->input('room'));

        $start = str_replace('T', ' ', $request->input('event.start'));
        $end   = str_replace('T', ' ', $request->input('event.end'));

        $start = Carbon::parse(Carbon::parse($start)->format('H:i:s'));
        $end = Carbon::parse(Carbon::parse($end)->format('H:i:s'));

        $reserved =  VerifyReservedPeriod::execute($room, $start, $end);

        return response()->json([
            'data' => [
                'reserved_period' => $reserved,
            ]
        ], Response::HTTP_OK);

    }
}
