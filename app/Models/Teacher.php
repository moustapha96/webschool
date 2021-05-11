<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    
    
    public $fillable = ['matriculeProfesseur'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function assign_subject(){
        return $this->hasMany(Assign_subject::class,'teacher_id');
    }
    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'teacher_id');
    }
    
}
