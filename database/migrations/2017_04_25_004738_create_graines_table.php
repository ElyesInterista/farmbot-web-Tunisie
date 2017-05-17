<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrainesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('plant_id')->index();
            $table->string('position');
            $table->timestamps();
        });


        Schema::table('graines', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plant_id')->references('id')->on('plant');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graines');
    }
}
