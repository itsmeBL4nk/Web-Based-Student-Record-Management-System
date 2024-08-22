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
        Schema::create('preregistrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_lrn');
            $table->string('la_name');
            $table->string('fi_name');
            $table->string('mi_name');
            $table->string('stud_gender');
            $table->string('stud_gradelvl');
            $table->string('stud_strand');
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
        Schema::dropIfExists('preregistrations');
    }
};
