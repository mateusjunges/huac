<?php

namespace Tests\Unit\Actions;

use HUAC\Actions\UpdateSurgicalRoomStatus;
use HUAC\Models\SurgicalRoom;
use Tests\TestCase;

class UpdateSurgicalRoomStatusTest extends TestCase
{
    public function test_it_can_update_the_surgical_room_status()
    {
        $room = SurgicalRoom::first();
        $this->assertTrue($room->available);

        $room = UpdateSurgicalRoomStatus::execute($room);

        $this->assertInstanceOf(
            SurgicalRoom::class,
            $room
        );

        $this->assertFalse($room->available);

        $room = UpdateSurgicalRoomStatus::execute($room);

        $this->assertInstanceOf(
            SurgicalRoom::class,
            $room
        );

        $this->assertTrue($room->available);
    }
}
