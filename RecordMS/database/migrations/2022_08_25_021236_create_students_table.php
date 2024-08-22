<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lrn');
            $table->string('lname');
            $table->string('fname');
            $table->string('mid_name');
            $table->string('gender');
            $table->string('email');
            $table->bigInteger('phone_num');
            $table->string('address');
            $table->foreignId('classes_id')->onUpdate('cascade');
            // $table->integer('qrtr_one')->nullable();
            // $table->integer('qrtr_two')->nullable();
            $table->string('role')->nullable();
            $table->string('password')->nullable();

            $table->index('classes_id');
            // ->onDelete('cascade')->onUpdate('cascade');
            // $table->string('photo')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
