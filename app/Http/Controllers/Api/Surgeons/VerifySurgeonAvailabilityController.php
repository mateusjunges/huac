<?php

namespace HUAC\Http\Controllers\Api\Surgeons;

use Carbon\Carbon;
use HUAC\Actions\VerifySurgeonAvailability;
use HUAC\Actions\VerifySurgeonAvailabilityWithConfirmedMaterialsOnly;
use HUAC\Models\Event;
use HUAC\Models\Surgery;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class VerifySurgeonAvailabilityController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        if (! is_null($request->input('surgery_id'))) {
            $surgery = Surgery::find($request->input('surgery_id'));
            $event = $surgery->events->last();
            if (is_null($event))
                $event = $surgery->id;
        } else if (! is_null($request->input('event_id'))) {
            $event = Event::find($request->input('event_id'));
            $surgery = $event->surgery()->first();
        }

        $start = str_replace('T', ' ', $request->input('start'));
        $start = Carbon::parse($start);
        $end = $request->input('end');
        $end = Carbon::parse($end);
        $estimatedTime = $request->input('estimated_time');


        $availability = VerifySurgeonAvailability::execute($event,
            $start,
            $end,
            $estimatedTime
        );

        return response()->json([
            'data' => [
                'availability' => $availability,
            ]
        ], Response::HTTP_OK);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyWithConfirmedMaterials(Request $request)
    {
        if (! is_null($request->input('surgery_id'))) {
            $surgery = Surgery::find($request->input('surgery_id'));
            $event = $surgery->events->last();
            if (is_null($event))
                $event = $surgery->id;
        } else if (! is_null($request->input('event_id'))) {
            $event = Event::find($request->input('event_id'));
            $surgery = $event->surgery()->first();
        }

        $start = str_replace('T', ' ', $request->input('start'));
        $start = Carbon::parse($start);
        $end = $request->input('end');
        $end = Carbon::parse($end);
        $estimatedTime = $request->input('estimated_time');


        $availability = VerifySurgeonAvailabilityWithConfirmedMaterialsOnly::execute($event,
            $start,
            $end,
            $estimatedTime
        );

        return response()->json([
            'data' => [
                'availability' => $availability,
            ]
        ], Response::HTTP_OK);
    }
}
