<?php

namespace HUAC\Http\Controllers\Api\SurgeryCenter\OnGoing;

use HUAC\Events\SurgeryCenter\EntranceAtSurgicalRoom;
use HUAC\Events\SurgeryCenter\SurgicalRoomExit;
use HUAC\Models\Event;
use Illuminate\Http\Request;

class SurgicalRoomController
{
    public function entrance(Event $event)
    {
        event(new EntranceAtSurgicalRoom($event));
    }

    public function exit(Event $event)
    {
        event(new SurgicalRoomExit($event));
    }
}
