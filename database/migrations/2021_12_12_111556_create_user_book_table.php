<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_book', function (Blueprint $table) {
           $table->bigInteger('user_id')->unsigned();    //students,subjectsテーブルのidが
           $table->bigInteger('book_id')->unsigned();    //bigIncrementであった場合はbigIntegerにする
           $table->primary(['user_id', 'book_id']);
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_book');
    }
}
