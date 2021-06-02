<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isbn')->unique();
            $table->string('title')->unique();
            $table->string('description');
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('publishing_id')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('created_at')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('publishing_id')->references('id')->on('publishings')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function(Blueprint $table)
        {
            $table->dropForeign(['category_id','publishing_id']);
        });
        Schema::dropIfExists('books');
    }
}
