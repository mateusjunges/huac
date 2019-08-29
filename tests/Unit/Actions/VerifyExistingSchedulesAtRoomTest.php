<?php

namespace Tests\Unit\Actions;

use HUAC\Actions\VerifyExistingSchedulesAtRoom;
use Tests\TestCase;

class VerifyExistingSchedulesAtRoomTest extends TestCase
{
    public function test_it_returns_true_if_there_exists_events_at_the_specified_time_interval()
    {
        $this->assertTrue(
            VerifyExistingSchedulesAtRoom::execute('', '', '', '')
        );
    }


    public function test_it_returns_false_if_there_does_not_exists_events_at_the_specified_time_interval()
    {
        $this->assertFalse(
            VerifyExistingSchedulesAtRoom::execute('', '', '', '')
        );
    }

}
