<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
	
    protected $table = 'reclamations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'dateRecla','commentaire',
    ];

    public function reclamationEtudiant(){
        return $this->belongsTo(Reclaetudiant::class,'idRecla');
    }
}
