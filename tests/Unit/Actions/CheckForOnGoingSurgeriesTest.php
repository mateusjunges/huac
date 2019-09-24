<?php

namespace Tests\Unit\Actions;

use Carbon\Carbon;
use HUAC\Actions\CheckForOngoingSurgeries;
use HUAC\Models\Event;
use Tests\TestCase;

class CheckForOnGoingSurgeriesTest extends TestCase
{
    /** @test */
    public function it_should_return_true_if_the_surgery_already_started()
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

        $this->event->entrance_at_surgical_center = Carbon::now();
        $this->event->save();

        $this->assertTrue(CheckForOngoingSurgeries::execute($this->event));
    }

    /** @test */
    public function it_should_return_false_if_the_surgery_does_not_started_yet()
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

        $this->assertFalse(CheckForOngoingSurgeries::execute($this->event));
    }

}
