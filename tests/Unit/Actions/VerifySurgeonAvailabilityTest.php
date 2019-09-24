<?php

namespace Tests\Unit\Actions;

use Carbon\Carbon;
use HUAC\Actions\VerifySurgeonAvailability;
use HUAC\Models\Event;
use HUAC\Models\Surgeon;
use HUAC\Models\SurgeonHasSurgery;
use Tests\TestCase;

class VerifySurgeonAvailabilityTest extends TestCase
{
    public function test_it_returns_false_if_the_surgeon_is_not_available()
    {
        SurgeonHasSurgery::create([
            'surgery_id' => $this->surgery->id,
            'surgeon_id' => Surgeon::first()->id,
        ]);

        SurgeonHasSurgery::create([
            'surgery_id' => $this->surgery2->id,
            'surgeon_id' => Surgeon::first()->id,
        ]);

        $start = Carbon::now()->addMinute();
        $end = Carbon::now()->addMinutes(59);

        $this->event2 = Event::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery->id,
            'surgical_room_id' => 1
        ]);

        $this->assertFalse(
            VerifySurgeonAvailability::execute(
                $this->surgery2->id,
                $start,
                $end
            )
        );

    }

    public function test_it_returns_true_if_the_surgeon_is_available()
    {
        SurgeonHasSurgery::create([
            'surgery_id' => $this->surgery->id,
            'surgeon_id' => Surgeon::first()->id,
        ]);

        SurgeonHasSurgery::create([
            'surgery_id' => $this->surgery2->id,
            'surgeon_id' => Surgeon::find(2)->id,
        ]);

        $start = Carbon::now()->addMinute();
        $end = Carbon::now()->addMinutes(59);

        $this->event2 = Event::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery->id,
            'surgical_room_id' => 1
        ]);

        $this->assertTrue(
            VerifySurgeonAvailability::execute(
                $this->surgery2->id,
                $start,
                $end
            )
        );
    }
}
