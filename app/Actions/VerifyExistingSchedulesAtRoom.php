<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\Event;
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

    public function execute(Event $event, $room)
    {
        $_surgery = $event->surgery()->first();

        $surgeries = Surgery::room($room)->get();

        $event_start_at = Carbon::parse($event->start_at);
        $event_end_at   = Carbon::parse($event->end_at);

        foreach ($surgeries as $surgery) {
            if ($surgery->id != $_surgery->id) {
                $surgeryEvent = $surgery->events()->orderBy('desc', 'created_at')->first();
                $surgery_event_start_at = Carbon::parse($surgeryEvent->start_at);
                $surgery_event_end_at = Carbon::parse($surgeryEvent->end_at);
                if ($event_start_at->between($surgery_event_start_at, $surgery_event_end_at)
                    or $event_end_at->between($surgery_event_start_at, $surgery_event_end_at)
                )
                    return true;
            }
        }
        return false;
    }
}
