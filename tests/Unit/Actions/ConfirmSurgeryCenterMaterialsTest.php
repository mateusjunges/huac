<?php

namespace Tests\Unit\Actions;

use Carbon\Carbon;
use HUAC\Actions\ConfirmSurgeryCenterMaterials as ConfirmSurgeryCenterMaterialsAction;
use HUAC\Models\Event;
use HUAC\Models\Log;
use HUAC\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ConfirmSurgeryCenterMaterialsTest extends TestCase
{
    public function test_it_can_confirm_surgery_center_materials()
    {
        $user = User::first();

        Auth::login($user);

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

        $this->assertInstanceOf(
            Log::class,
            ConfirmSurgeryCenterMaterialsAction::execute(
                $this->surgery,
                'Test action'
            )
        );
        $this->assertCount(1, Log::all());
    }
}
