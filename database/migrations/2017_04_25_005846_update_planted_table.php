<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlantedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planted', function (Blueprint $table) {
            $table->integer('user_id')->index();
            $table->integer('plant_id')->index();

            $table->string('X');
            $table->string('Y');
        });

        Schema::table('planted', function($table) {
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
        Schema::table('planted', function (Blueprint $table) {
            //
        });
    }
}
