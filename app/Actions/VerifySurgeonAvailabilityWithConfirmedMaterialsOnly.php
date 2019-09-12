<?php

namespace HUAC\Actions;

use Carbon\Carbon;
use HUAC\Models\Event;
use HUAC\Models\Surgery;

class VerifySurgeonAvailabilityWithConfirmedMaterialsOnly
{

    /**
     * @param $event
     * @param $start
     * @param $end
     * @param int $estimatedTime
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
            if (! $surgeon->isAvailableWithConfirmedMaterialsOnly($start, $end, $surgery)) {
                return false;
            }
        }

        return true;
    }
}
