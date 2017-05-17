<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->increments('id');

            $table->string('Temperature');
            $table->string('Wind');
            $table->string('WindDirection');
            $table->string('Humidity');
            $table->string('Rain');

            $table->integer('user_id')->index();
            $table->timestamps();
        });

        Schema::table('weather', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather');
    }
}
