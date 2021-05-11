<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclaetudiant extends Model
{
    //
    protected $table = 'reclaetudiants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idStudent','idRecla',
    ];

    public function student() {
        return $this->belongsTo(Student::class,'idStudent');
    }
    public function reclamation() {
        return $this->belongsTo(Reclamation::class,'idRecla');
    }

}
