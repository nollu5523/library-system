<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     	Eloquent::unguard();
     	$this->call(UsersTableSeeder::class);   
        $this->call(AuthorsTableSeeder::class);
        $this->call(CategoriesTablesSeeder::class);
        $this->call(PublishingsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(AuthorsBooksTableSeeder::class);
        
    }
}
