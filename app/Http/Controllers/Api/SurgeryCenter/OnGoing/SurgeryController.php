<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Events\SurgeryCenter\SurgeryFinished;
use HUAC\Events\SurgeryCenter\SurgeryStarted;
use HUAC\Models\Event;
use Illuminate\Http\Request;

class SurgeryController
{
    public function start(Event $event)
    {
        event(new SurgeryStarted($event));
    }

    public function finish(Event $event)
    {
        event(new SurgeryFinished($event));
    }
}
