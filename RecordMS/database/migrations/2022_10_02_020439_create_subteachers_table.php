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
        Schema::create('subteachers', function (Blueprint $table) {
            $table->id();
            $table->string('sem');
            $table->foreignId('subject_ID')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('teacher_ID')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('class_ID')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('sem')->nullable();
            // $table->foreignId('subject_ID')->nullable();
            // $table->foreignId('teacher_ID')->nullable();
            // $table->foreignId('class_ID')->nullable();
            $table->timestamps();
            $table->index('subject_ID');
            $table->index('teacher_ID');
            $table->index('class_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subteachers');
    }
};
