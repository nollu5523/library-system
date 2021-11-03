<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors_books', function (Blueprint $table) {
            $table->unsignedInteger('author_id')->nullable();
            $table->unsignedInteger('book_id')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('created_at')->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('authors_books', function (Blueprint $table)
        {
            $table->dropForeign(['book_id','author_id']);
        });
        Schema::dropIfExists('authors_books');
    }
}
