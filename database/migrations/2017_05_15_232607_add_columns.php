<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controlles', function (Blueprint $table) {

            $table->string('GoToX');
            $table->string('GoToY');
            $table->string('GoToZ');
            $table->string('speed');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controlles', function (Blueprint $table) {
            //
        });
    }
}
