<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorsBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors_books')->insert([
        	'author_id' => 1,
        	'book_id' => 1,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 2,
        	'book_id' => 2,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 3,
        	'book_id' => 3,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 4,
        	'book_id' => 4,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 5,
        	'book_id' => 5,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 6,
        	'book_id' => 6,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 7,
        	'book_id' => 7,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 8,
        	'book_id' => 8,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 9,
        	'book_id' => 9,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 10,
        	'book_id' => 10,
        ]);
        DB::table('authors_books')->insert([
        	'author_id' => 1,
        	'book_id' => 11,
        ]);
    }
}
