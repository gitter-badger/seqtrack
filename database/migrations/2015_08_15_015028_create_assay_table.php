<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateAssayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assay', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->boolean('default');
            $table->timestamps();

            $table->unique('name');

        });

        DB::table('assay')->insert(
            array(
                array("name"=>"Nextera",  "default"=>true,  "created_at"=>  Carbon::now(),  "updated_at"=>Carbon::now())
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assay');
    }
}
