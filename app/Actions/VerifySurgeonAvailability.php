<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\Event;

class VerifySurgeonAvailability
{
    /**
    * VerifySurgeonAvailability constructor
    */
    public function __construct()
    {
        //
    }

    /**
     * @param Event $event
     * @param int $estimatedTime
     * @param $start
     * @param $end
     */
    public static function execute(Event $event, $start, $end, $estimatedTime = 0)
    {

        if ($end == null and $estimatedTime != 0) {
            $end = Carbon::parse($start)->addHours($estimatedTime);
        }

        $surgery = $event->surgery()->first();

        if ($surgery == null)
            return false;

        $surgeons = $surgery->surgeons()->get();
        foreach ($surgeons as $surgeon) {
            if (! $surgeon->isAvailable($start, $end, $surgery)) {
                return false;
            }
        }

        return true;
    }
}
