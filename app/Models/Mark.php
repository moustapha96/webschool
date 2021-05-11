<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
                'mark_value',
                'typeNote',
                'student_id',
                'anneeAca_id',
            ];

    protected $table = 'marks';

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function students(){
        return $this->hasOne(Student::class,'student_id');
    }

   public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    
    
}
