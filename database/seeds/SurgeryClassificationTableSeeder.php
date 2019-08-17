<?php

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
                'description' => 'Cirurgia limpa'
            ],
            [
                'name'        => 'Contaminada',
                'description' => 'Cirurgia contaminada'
            ],
            [
                'name'        => 'Potencialmente contaminada',
                'description' => 'Cirurgia potencialmente contaminada'
            ],
            [
                'name'        => 'Infectada',
                'description' => 'Cirurgia infectada'
            ]
        ]);
    }
}
