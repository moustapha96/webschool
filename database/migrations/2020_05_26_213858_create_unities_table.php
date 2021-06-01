<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unities', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->text('name');
            $table->integer('credit');
            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('semester_id')->unsigned();
            $table->timestamps();

            $table->boolean('flag')->default(true);
            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('semester_id')->references('id')->on('semesters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unities');
    }
}
