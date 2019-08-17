<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnestheticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anesthetics')->insert([
            ['name' => 'Local',                     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Peri',                      'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Raqui',                     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Geral',                     'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bloqueio',                  'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sedação',                   'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'A critério do anestesista', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
