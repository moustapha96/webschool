<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=[
        'coefficient',
        'name',
        'unity_id ',
    ];

    protected $table = 'subjects';

    public function unitie(){
        return $this->belongsTo(Unitie::class,'unity_id');
    }
    public function mark(){
        return $this->hasMany(Mark::class,'subject_id');
    }
    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'subject_id');
    }
    
}
