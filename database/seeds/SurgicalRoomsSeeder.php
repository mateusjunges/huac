<?php

use HUAC\Models\SurgicalRoom;
use Illuminate\Database\Seeder;

class SurgicalRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SurgicalRoom::create([
            'name'                            => 'Sala 1',
            'color'                           => '#09801f',
            'morning_reservation_starts_at'   => '08:00:00',
            'morning_reservation_ends_at'     => '09:00:00',
            'afternoon_reservation_starts_at' => '13:00:00',
            'afternoon_reservation_ends_at'   => '14:00:00'
        ]);
        SurgicalRoom::create([
            'name'                            => 'Sala 2',
            'color'                           => '#2445bd',
            'morning_reservation_starts_at'   => '09:00:00',
            'morning_reservation_ends_at'     => '10:00:00',
            'afternoon_reservation_starts_at' => '14:00:00',
            'afternoon_reservation_ends_at'   => '15:00:00'
        ]);
        SurgicalRoom::create([
            'name'                            => 'Sala 3',
            'color'                           => '#8f8d2f',
            'morning_reservation_starts_at'   => '10:00:00',
            'morning_reservation_ends_at'     => '11:00:00',
            'afternoon_reservation_starts_at' => '15:00:00',
            'afternoon_reservation_ends_at'   => '16:00:00'
        ]);
        SurgicalRoom::create([
            'name'                            => 'Sala 4',
            'color'                           => '#7837cc',
            'morning_reservation_starts_at'   => '11:00:00',
            'morning_reservation_ends_at'     => '12:00:00',
            'afternoon_reservation_starts_at' => '16:00:00',
            'afternoon_reservation_ends_at'   => '17:00:00'
        ]);

    }
}
