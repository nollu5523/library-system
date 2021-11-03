<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table)
        {
            $table->increments('id');
            $table->date('booking')->nullable();
            $table->date('booking_end')->nullable();
            $table->date('rent_date')->nullable();
            $table->date('return_date')->nullable();
            $table->date('returned')->nullable();
            $table->unsignedInteger('book_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('created_at')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rents',function (Blueprint $table)
        {
            $table->dropForeign(['book_id','user_id']);
        });
        
        Schema::dropIfExists('rents');
    }
}
