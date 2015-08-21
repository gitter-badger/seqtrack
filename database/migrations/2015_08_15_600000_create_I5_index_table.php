<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateI5IndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i5_index', function (Blueprint $table) {
            $table->increments('id');
            $table->string('index', 50);
            $table->string('sequence', 20);
            $table->integer('index_set_id');
            $table->foreign('index_set_id')->references('id')->on('index_set');
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
        Schema::drop('i5_index');
    }
}