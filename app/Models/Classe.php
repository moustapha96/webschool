<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'nameClass','niveau','classroom_id'
    ];

   public function student(){
        return $this->hasMany(Student::class,'class_id');
   }

    public function mark(){
        return $this->hasMany(Mark::class,'class_id');
    }

    public function marks(){
        return $this->hasMany(Mark::class,'class_id');
    }
    public function semester(){
        return $this->hasMany(Semester::class,'class_id');
    }

    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'classe_id');
    }
    
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
}
