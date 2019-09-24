<?php

namespace Tests\Unit\Events;

use Carbon\Carbon;
use HUAC\Actions\ConfirmCMEMaterials;
use HUAC\Events\MaterialsConfirmedByCME;
use HUAC\Events\MaterialsDeniedByCME;
use HUAC\Models\Event;
use HUAC\Models\User;
use Illuminate\Support\Facades\Event as EventFacade;
use Tests\TestCase;

class MaterialsConfirmedByCMETest extends TestCase
{
    public function test_it_dispatches_the_correct_event()
    {
        EventFacade::fake();

        $this->actingAs(User::first());

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

        $surgery = $this->surgery;

        ConfirmCMEMaterials::execute($this->surgery, 'Test action');

        EventFacade::assertDispatched(MaterialsConfirmedByCME::class, function($e) use ($surgery) {
           return $e->surgery->id === $surgery->id;
        });

        EventFacade::assertNotDispatched(MaterialsDeniedByCME::class);
    }
}
