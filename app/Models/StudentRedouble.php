<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRedouble extends Model
{
    protected $table = 'etudiants_redoublants';
    
    protected $fillable = [
        'student_id','class_id','academic_year_id'
    ];
    public function student() {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function academic_year() {
        return $this->belongsTo(Academic_year::class,'academic_year_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
