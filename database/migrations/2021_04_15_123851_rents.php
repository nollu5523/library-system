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
            $table->premiumDate('rent_date');
            $table->premiumDate('return_date');
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('user_id');
            $table->date('updated_at')->nullable();
            $table->date('created_at')->nullable();
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
