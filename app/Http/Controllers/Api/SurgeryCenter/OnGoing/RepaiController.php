<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Events\SurgeryCenter\EntranceAtRepai;
use HUAC\Events\SurgeryCenter\ExitOfRepai;
use HUAC\Models\Event;
use Illuminate\Http\Request;

class RepaiController
{
    public function entrance(Event $event)
    {
        event(new EntranceAtRepai($event));
    }

    public function exit(Event $event)
    {
        event(new ExitOfRepai($event));
    }
}
