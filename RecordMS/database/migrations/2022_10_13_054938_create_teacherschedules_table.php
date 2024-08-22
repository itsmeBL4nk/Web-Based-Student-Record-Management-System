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
        Schema::create('teacherschedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('techr_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('schedule_id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->index('techr_id');
            $table->index('schedule_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacherschedules');
    }
};
