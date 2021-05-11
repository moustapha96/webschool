<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected  $table = 'bulletins';
    protected $fillable = [
            'average_student',
            'average_classe',
            'rang_student',
            'apreciation',
            'credit',
            'data',
            'class_id',   
            'student_id',
            'academic_year_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
    public function academic_year(){
        return $this->belongsTo(Academic_year::class,'academic_year_id');
    }
    
}
