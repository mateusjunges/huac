<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\Event;
use HUAC\Models\Surgery;

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
     * @return bool
     */
    public static function execute($event, $start, $end, $estimatedTime = 0)
    {

        if ($end == $start and $estimatedTime != 0) {
            $end = Carbon::parse($end)->addHours($estimatedTime);
        }

        if ($event instanceof Event)
            $surgery = $event->surgery()->first();
        else $surgery = Surgery::find($event);

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
