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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_code');
            $table->foreignId('teach_id')->onUpdate('cascade');
            $table->foreignId('gradelevel_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('strand_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('schoolyr_id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

            $table->index('teach_id');
            $table->index('gradelevel_id');
            $table->index('strand_id');
            $table->index('section_id');
            $table->index('schoolyr_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
