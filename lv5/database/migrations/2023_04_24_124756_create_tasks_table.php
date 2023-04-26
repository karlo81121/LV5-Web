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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('nastavnik_id');
            $table->integer('student_id')->default(null)->nullable();
            $table->boolean('isApproved')->default(null)->nullable();
            $table->string('naziv_rada');
            $table->string('naziv_rada_eng');
            $table->string('zadatak_rada');
            $table->string('tip_studija');
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
        Schema::dropIfExists('tasks');
    }
};
