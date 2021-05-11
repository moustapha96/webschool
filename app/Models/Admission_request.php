<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission_request extends Model
{
    //
    protected $table = 'admission_requests';

    protected $fillable = [
        'prenom','nom', 'dateNaissance',
        'lieuNaissance','email','adresse','class_id',
        'bulletin','ine','avatar','genre','status'
    ];
    public function classe() {
        return $this->belongsTo(Classe::class,'class_id');
    }

}
