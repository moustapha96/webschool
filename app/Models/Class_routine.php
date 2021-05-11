<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class_routine extends Model
{
    protected $table='class_routines';
    protected $fillable=[
        'day',
        'start_time',
        'end_time',
        'classe_id', 
        'subject_id',
        'teacher_id'
    ];
	public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
	public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }
}
