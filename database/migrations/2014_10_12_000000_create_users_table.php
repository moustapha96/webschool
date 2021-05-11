<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
                       $table->string('nom');
                       $table->boolean('status')->default(true);
                       $table->enum('role',  ['student','supervisor','librian','accountant','parent', 'teacher', 'admin'])->default('student');
                       $table->string('prenom');
                       $table->string('adresse');
                       $table->string('genre');
                       $table->string('lieuNaissance');
                       $table->string('avatar')->default('avatar.png');
                       $table->date('dateNaissance');
                       $table->string('tel','9')->default('779009090');
                       $table->string('email')->unique();
                       $table->timestamp('email_verified_at')->nullable();
                       $table->string('password');
                       $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
