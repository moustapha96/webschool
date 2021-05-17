<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->id();
            $table->enum('day',  ['LUNDI','MARDI','MERCREDI','JEUDI','VENDREDI', 'SAMEDI'])->default('LUNDI');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('classe_id')->unsigned();
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_routines');
    }
}
