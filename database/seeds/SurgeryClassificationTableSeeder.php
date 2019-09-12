<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SurgeryClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surgery_classifications')->insert([
            [
                'name'        => 'Limpa',
                'description' => 'Cirurgia limpa',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => 'Contaminada',
                'description' => 'Cirurgia contaminada',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => 'Potencialmente contaminada',
                'description' => 'Cirurgia potencialmente contaminada',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name'        => 'Infectada',
                'description' => 'Cirurgia infectada',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ]
        ]);
    }
}
