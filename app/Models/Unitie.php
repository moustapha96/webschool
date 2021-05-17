<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unitie extends Model
{
    protected $fillable = [
        'code',
        'name',
        'credit',
        'semester_id',
        'class_id'
    ];

    protected $table = 'unities';

   
    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }

    public function subject(){
        return $this->hasMany(Subject::class,'unity_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }

   
  

}
