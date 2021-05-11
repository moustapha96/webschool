<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_file extends Model
{
    protected $table ='student_files';

    protected $fillable = [
        'student_id',
        'bulletin_id',
        'document',
        'academic_year_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function bulletin(){
        return $this->belongsTo(Bulletin::class,'bulletin_id');
    }

    public function academic_year(){
        return $this->belongsTo(Academic_year::class,'academic_year_id');
    }
}
