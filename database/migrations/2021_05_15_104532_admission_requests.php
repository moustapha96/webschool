<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdmissionRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admission_requests', function (Blueprint $table) {
            $table->id();
            $table->string('ine', '13')->unique();
            
            
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('genre');
            $table->string('lieuNaissance');
            $table->string('avatar')->default('avatar.png');
            $table->date('dateNaissance');
            $table->string('tel', '9')->default('779009090');
            $table->string('email')->unique();
            $table->bigInteger('class_id')->unsigned();
            $table->string('bulletin');

            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admission_requests');
    }
}
