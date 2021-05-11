<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assign_subject extends Model
{
    public $fillable = ['subject_id','teacher_id'];
    protected $table = 'assign_subjects';


    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    
}
