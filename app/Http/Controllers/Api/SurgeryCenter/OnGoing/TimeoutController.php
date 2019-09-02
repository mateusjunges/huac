<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Events\SurgeryCenter\TimeOutDone;
use HUAC\Models\Event;
use Illuminate\Http\Request;

class TimeoutController
{
    public function __invoke(Event $event)
    {
        event(new TimeOutDone($event));
    }
}
