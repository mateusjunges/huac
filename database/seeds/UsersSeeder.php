<?php

use HUAC\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mateus Junges',
            'username' => 'mateusjunges',
            'email' => 'mateus@junges.co',
            'password' => Hash::make('mateusjunges'),
        ]);
        User::create([
           'name' => 'Alceu Britto',
           'username' => 'alceubritto',
           'email' => 'alceubrittoneto@gmail.com',
           'password' => Hash::make('alceubritto'),
        ]);
        User::create([
            'name' => 'Idomar Cerutti',
            'username' => 'idomar',
            'email' => 'idomar@uepg.br',
            'password' => Hash::make('idomar'),
        ]);
        User::create([
           'name' => 'Dierone Foltran',
           'username' => 'dierone',
           'email' => 'dcfoltran@uepg.br',
           'password' => Hash::make('dierone'),
        ]);
        User::create([
           'name' => 'Ezequiel Gueiber',
           'username' => 'ezequiel',
           'email' => 'ezequiel@aguiasistemas.com.br',
           'password' => Hash::make('ezequiel'),
        ]);
        User::create([
           'name' => 'Diolete Cerutti',
           'username' => 'diolete',
           'email' => 'diolete@uepg.br',
           'password' => Hash::make('diolete'),
        ]);

    }
}
