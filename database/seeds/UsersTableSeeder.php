<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Admin',
        	'email' => 'admin@spcfmvp.test',
        	'password' => bcrypt('admin1234'),
        	'remember_token' => str_random(10)
        ]);
    }
}
