<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Doctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id_doctor', 10);
            $table->string('image');
            $table->string('full_name', 100);
            $table->boolean('gender');
            $table->string('phone');
            $table->string('address');
            $table->date('date_birth');
            $table->text('email')->unique();
            $table->text('password');
            $table->text('introduce');
            $table->unsignedInteger('id_specialist');
            $table->foreign('id_specialist')->references('id_specialist')->on('specialist');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctors');
    }
}