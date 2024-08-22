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
        Schema::create('preenrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stud_id')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('student_lrn');
            $table->string('grade_lvl');
            $table->timestamps();

            $table->index('stud_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preenrollments');
    }
};
