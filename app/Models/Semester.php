<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable=['code','name','class_id'];

    protected $table = 'semesters';

    public function unitie(){
        return $this->hasMany(Unitie::class,'semester_id');
    }

    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
