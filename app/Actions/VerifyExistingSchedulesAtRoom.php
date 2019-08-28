<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\Surgery;

class VerifyExistingSchedulesAtRoom
{
    /**
    * VerifyExisistingSchedulingsAtRoom constructor
    */
    public function __construct()
    {
        //
    }

    public static function execute($room, $start, $end, $surgery)
    {
        $_surgery = Surgery::find($surgery);

        $surgeries = Surgery::room($room)->get();

        foreach ($surgeries as $surgery) {
            if ($surgery->id != $_surgery->id) {
                $surgeryEvent = $surgery->events()->orderBy('created_at', 'desc')->first();
                $surgery_event_start_at = Carbon::parse($surgeryEvent->start_at);
                $surgery_event_end_at = Carbon::parse($surgeryEvent->end_at);
                if ($start->greaterThan($surgery_event_start_at) and $start->lessThan($surgery_event_end_at))
                    return true;
                if ($end->greaterThan($surgery_event_start_at) and $start->lessThan($surgery_event_end_at))
                    return true;
            }
        }
        return false;
    }
}
