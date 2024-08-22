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
        Schema::create('transcripts', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->foreignId('stud_ID')->onDelete('cascade')->onUpdate('cascade');
            $table->string('message_reject')->nullable();
            $table->string('released_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('other_reason')->nullable();
            $table->integer('user_id');
            $table->bigInteger('user_lrn');
            $table->string('user_lname');
            $table->string('user_fname');
            $table->string('user_midname');
            $table->timestamps();

            $table->index('stud_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transcripts');
    }
};
