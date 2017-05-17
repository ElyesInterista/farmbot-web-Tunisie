<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssoGraines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('graines', function (Blueprint $table) {
            $table->integer('user_id')->index();
            $table->integer('plant_id')->index();

            $table->string('position');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('graines', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plant_id')->references('id')->on('plant');
        });
    }
}
