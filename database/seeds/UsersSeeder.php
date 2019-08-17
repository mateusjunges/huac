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
    }
}
