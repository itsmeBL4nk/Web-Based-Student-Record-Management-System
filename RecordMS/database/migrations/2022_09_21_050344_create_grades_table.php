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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subjectteacher_id')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('subjectteacher_id')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('lrn')->nullable();
            $table->string('sub_name')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('semester')->nullable();
            $table->string('school_yr')->nullable();
            $table->integer('qrtr_one')->default(0);
            $table->integer('qrtr_two')->default(0);

            // $table->foreign('user_id')
            // ->references('id')->on('users')
            // ->onDelete('cascade');
           

            $table->timestamps();
            $table->index('subjectteacher_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
