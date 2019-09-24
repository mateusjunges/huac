<?php

namespace Tests\Unit\Events;

use Carbon\Carbon;
use HUAC\Actions\ConfirmSurgeryCenterMaterials;
use HUAC\Events\MaterialsConfirmedBySurgeryCenter;
use HUAC\Events\MaterialsDeniedBySurgeryCenter;
use HUAC\Models\Event as SurgeryEvent;
use HUAC\Models\User;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class MaterialsConfirmedBySurgeryCenterTest extends TestCase
{
    public function test_it_dispatch_the_correct_event()
    {
        Event::fake();

        $this->actingAs(User::first());

        $start = Carbon::now();
        $end = Carbon::now()->addHour();

        SurgeryEvent::create([
            'title' => 'Test event',
            'color' => '#ffffff',
            'start_at' => $start,
            'end_at' => $end,
            'surgery_id' => $this->surgery->id,
            'surgical_room_id' => 1
        ]);

        $surgery = $this->surgery;

        ConfirmSurgeryCenterMaterials::execute($surgery, 'Test if a event is dispatched');

        Event::assertDispatched(MaterialsConfirmedBySurgeryCenter::class, function ($e) use ($surgery) {
            return $e->surgery->id === $surgery->id;
        });

        Event::assertNotDispatched(MaterialsDeniedBySurgeryCenter::class);
    }
}
