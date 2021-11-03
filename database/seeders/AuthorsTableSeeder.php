<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
        	'id' => 1,
        	'name' => 'Adam',
        	'surname' => 'Mickiewicz',
        ]);
        DB::table('authors')->insert([
        	'id' => 2,
        	'name' => 'B.A',
        	'surname' => 'Paris',
        ]);
        DB::table('authors')->insert([
        	'id' => 3,
        	'name' => 'Victoria',
        	'surname' => 'Schwab',
        ]);
        DB::table('authors')->insert([
        	'id' => 4,
        	'name' => 'Stanisław',
        	'surname' => 'Lem',
        ]);
        DB::table('authors')->insert([
        	'id' => 5,
        	'name' => 'Stephen',
        	'surname' => 'King',
        ]);
        DB::table('authors')->insert([
        	'id' => 6,
        	'name' => 'Bolesław',
        	'surname' => 'Prus',
        ]);
        DB::table('authors')->insert([
        	'id' => 7,
        	'name' => 'Krzysztof',
        	'surname' => 'Gordon',
        ]);
        DB::table('authors')->insert([
        	'id' => 8,
        	'name' => 'Małgorzata',
        	'surname' => 'Kalemba-Dróżdż',
        ]);
        DB::table('authors')->insert([
        	'id' => 9,
        	'name' => 'Robert',
        	'surname' => 'Kiyosaki',
        ]);
        DB::table('authors')->insert([
        	'id' => 10,
        	'name' => 'Bolesław',
        	'surname' => 'Leśmian',
        ]);
    }
}
