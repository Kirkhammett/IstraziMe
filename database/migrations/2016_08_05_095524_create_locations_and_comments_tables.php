<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsAndCommentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('slug')->default('');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table){
            $table->increments('id');
            $table->integer('location_id')->unsigned()->default(0);
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->string('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->string('slug')->default('');
            $table->text('commentBody')->default('');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
        Schema::drop('comments');
      
    }
}
