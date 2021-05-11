<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table='classrooms';
    protected $fillable=[
        'name',
        'description'
    ];

    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'classroom_id');
    }
    public function classes(){
        return $this->hasMany(Classe::class);
    }
}
