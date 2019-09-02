<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Events\SurgeryCenter\EntranceAtSurgeryCenter;
use HUAC\Events\SurgeryCenter\SurgicalCenterExit;
use HUAC\Models\Event;
use Illuminate\Http\Request;

class SurgeryCenterController
{
    public function entrance(Event $event)
    {
        event(new EntranceAtSurgeryCenter($event));
    }

    public function exit(Event $event)
    {
        event(new SurgicalCenterExit($event));
    }
}
