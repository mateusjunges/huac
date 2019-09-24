<?php

namespace Tests\Unit\Actions;

use Carbon\Carbon;
use HUAC\Actions\VerifyExistingSchedulesAtRoom;
use HUAC\Models\Event;
use Tests\TestCase;

class VerifyExistingSchedulesAtRoomTest extends TestCase
{
    public function test_it_returns_true_if_there_exists_events_at_the_specified_time_interval()
    {
        $start = Carbon::now();
        $end = Carbon::now()->addHour();

        $this->event = Event::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery->id,
            'surgical_room_id' => 1
        ]);

        $this->event2 = Event::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery2->id,
            'surgical_room_id' => 1
        ]);

        $this->assertTrue(
            VerifyExistingSchedulesAtRoom::execute(1, $start, $end, $this->surgery3->id)
        );
        $this->assertFalse(
            VerifyExistingSchedulesAtRoom::execute(2, $start, $end, $this->surgery3->id)
        );
    }


    public function test_it_returns_false_if_there_does_not_exists_events_at_the_specified_time_interval()
    {
        $start = Carbon::now();
        $end = Carbon::now()->addHour();

        $this->event = Event::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery->id,
            'surgical_room_id' => 1
        ]);

        $this->event2 = Event::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery2->id,
            'surgical_room_id' => 1
        ]);


        $this->assertFalse(
            VerifyExistingSchedulesAtRoom::execute(1, Carbon::now()->subHours(5), Carbon::now()->subHours(3), $this->surgery3->id)
        );
        $this->assertFalse(
            VerifyExistingSchedulesAtRoom::execute(2, Carbon::now()->subHours(5), Carbon::now()->subHours(3), $this->surgery3->id)
        );
    }

}
