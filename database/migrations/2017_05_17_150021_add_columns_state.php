<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controlles', function (Blueprint $table) {

            $table->string('state');
            $table->string('up')->change();
            $table->string('down')->change();
            $table->string('left')->change();
            $table->string('right')->change();
            $table->string('camera')->change();
            $table->string('zoom_in')->change();
            $table->string('zoom_out')->change();
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
