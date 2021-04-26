<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	'id' => 1,
        	'isbn' => '978-83-900210-1-0',
        	'title' => 'Pan Tadeusz',
        	'description' => 'Akcja Pana Tadeusza rozgrywa się na Litwie w dworku w Soplicowie oraz w Dobrzynie.',
        	'category_id' => 1,
        	'publishing_id' => 1,
        ]);
    }
}
