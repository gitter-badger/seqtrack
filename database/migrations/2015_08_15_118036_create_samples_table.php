<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('batch_id')->unsigned();
            $table->string('sample_id', 120);
            $table->integer('sample_id_suffix');
            $table->string('plate', 120)->nullable();
            $table->string('well', 120)->nullable();

            $table->integer('i7_index_id')->unsigned();
            $table->integer('i5_index_id')->unsigned()->nullable();

            $table->string('description',120)->nullable();
            $table->integer('runs_remaining');
            $table->integer('instrument_lane');


            $table->foreign('batch_id')->references('id')->on('batches');

            $table->foreign('i7_index_id')->references('id')->on('i7_index');
            $table->foreign('i5_index_id')->references('id')->on('i5_index');

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
        Schema::drop('samples');
    }
}
