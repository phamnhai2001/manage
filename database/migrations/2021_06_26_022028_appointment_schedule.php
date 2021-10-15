<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppointmentSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_schedule', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('name_customer',50);
            $table->string('phone_customer',10);
            $table->date('date');
            $table->unsignedInteger('id_customer');
            $table->foreign('id_customer')->references('id_customer')->on('customer');
            $table->unsignedInteger('id_doctor');
            $table->foreign('id_doctor')->references('id_doctor')->on('doctors');
            $table->unsignedInteger('id_time');
            $table->foreign('id_time')->references('id_time')->on('time_slot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointment_schedule');
    }
}