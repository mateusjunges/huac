<?php

use Illuminate\Database\Seeder;

class SurgeonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \HUAC\Models\Surgeon::create([
            'user_id' => 1,
            'crm'     => '16021826',
        ]);
        \HUAC\Models\Surgeon::create([
            'user_id' => 2,
            'crm'     => '123456789'
        ]);
    }
}
