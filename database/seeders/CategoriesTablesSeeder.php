<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'id' => 1,
        	'category' => 'klasyka',
        ]);
        DB::table('categories')->insert([
        	'id' => 2,
        	'category' => 'fantasy',
        ]);
        DB::table('categories')->insert([
        	'id' => 3,
        	'category' => 'science fiction',
        ]);
        DB::table('categories')->insert([
        	'id' => 4,
        	'category' => 'horror',
        ]);
        DB::table('categories')->insert([
        	'id' => 5,
        	'category' => 'kryminał',
        ]);
        DB::table('categories')->insert([
        	'id' => 6,
        	'category' => 'lektury szkolne',
        ]);
        DB::table('categories')->insert([
        	'id' => 7,
        	'category' => 'prawo',
        ]);
        DB::table('categories')->insert([
        	'id' => 8,
        	'category' => 'kuchnia',
        ]);
        DB::table('categories')->insert([
        	'id' => 9,
        	'category' => 'biznes',
        ]);
        DB::table('categories')->insert([
        	'id' => 10,
        	'category' => 'biografia',
        ]);

    }
}
