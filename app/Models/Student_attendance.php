<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_attendance extends Model
{
    protected $fillable = [
        'date','attendance','student_id','class_id'
    ];
    protected $table = 'student_attendances';

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
