<?php

namespace HUAC\Actions;

use HUAC\Events\RoomStatusChangedEvent;
use HUAC\Models\SurgicalRoom;

class UpdateSurgicalRoomStatus
{

    /**
     * @param SurgicalRoom $room
     * @return SurgicalRoom
     */
    public static function execute(SurgicalRoom $room)
    {
        $room->available = !$room->available;
        $room->save();

        event(new RoomStatusChangedEvent($room));

        return $room;
    }
}
