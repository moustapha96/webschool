<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('attendance');
            $table->bigInteger('exam_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->timestamps();
            $table->boolean('flag')->default(true);
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_attendances');
    }
}
