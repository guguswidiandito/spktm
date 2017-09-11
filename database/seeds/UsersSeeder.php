<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user           = new User;
        $user->name     = 'Administrator';
        $user->username = 'admin';
        $user->email    = 'admin@stmikymitegal.com';
        $user->password = bcrypt('rahasia');
        $user->save();
    }
}
