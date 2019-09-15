<?php

use HUAC\Models\User;
use Illuminate\Database\Seeder;

class UserHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('username', 'mateusjunges')->first()->assignPermissions('admin');
        User::where('username', 'alceubritto')->first()->assignPermissions('admin');
        User::where('username', 'ezequiel')->first()->assignPermissions('admin');
        User::where('username', 'dierone')->first()->assignPermissions('admin');
        User::where('username', 'idomar')->first()->assignPermissions('admin');
        User::where('username', 'diolete')->first()->assignPermissions('admin');
    }
}
