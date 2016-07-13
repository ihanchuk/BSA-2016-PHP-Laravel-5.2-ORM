<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->nullable()->unsigned();
            $table->string("author");
            $table->string("genre");
            $table->smallInteger("year")->unsigned();
            $table->string("title");
            $table->foreign('user_id')->references('id')->on('books_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }
}
