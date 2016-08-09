<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned()->default(0);
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->string('image_file')->nullable();
            $table->text('loc_info')->default('');
            $table->text('loc_history')->default('');
            $table->integer('price')->unsigned()->default(0);
            $table->integer('price_group')->unsigned()->default(0);
            $table->integer('price_child')->unsigned()->default(0);
            $table->float('lat');
            $table->float('long');
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
        Schema::drop('localities');
    }
}
