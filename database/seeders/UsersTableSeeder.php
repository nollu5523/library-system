<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        	'id' => 1,
        	'name' => 'admin',
        	'surname' => 'admin',
        	'email' => 'admin123@gmail.com',
        	'password' => Hash::make('1234'),
        	'admin' => 1,
        ]);
        DB::table('users')->insert([
        	'id' => 2,
        	'name' => 'user',
        	'surname' => 'user',
        	'email' => 'user1@gmail.com',
        	'password' => Hash::make('1234'),
        	'admin' => null,
        ]);
    }
}
