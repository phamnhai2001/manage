<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_schedule', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->date('date');
            $table->unsignedInteger('id_time');
            $table->foreign('id_time')->references('id_time')->on('time_slot');
            $table->unsignedInteger('id_doctor');
            $table->foreign('id_doctor')->references('id_doctor')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rest_schedule');
    }
}