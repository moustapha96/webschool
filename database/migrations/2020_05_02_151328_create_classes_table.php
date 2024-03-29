<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
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
            // $table->string('nameClass');
            // $table->string('code');
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('filiere_id')->unsigned();
            $table->bigInteger('niveau_id')->unsigned();
            $table->timestamps();
            $table->boolean('flag')->default(true);

            $table->foreign('filiere_id')->references('id')->on('filieres');
            $table->foreign('niveau_id')->references('id')->on('niveaux');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
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



}
