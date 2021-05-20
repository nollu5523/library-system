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
            $table->string('isbn');
            $table->string('title');
            $table->string('description');
            $table->unsignedInteger('quantity')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('publishing_id');
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('publishing_id')->references('id')->on('publishings')->onDelete('cascade');
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
