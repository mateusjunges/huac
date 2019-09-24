<?php

namespace HUAC\Actions;

use HUAC\Models\Event;

class CheckForOngoingSurgeries
{
    public static function execute(Event $event)
    {
        return $event->entrance_at_surgical_center !== null;
    }
}
