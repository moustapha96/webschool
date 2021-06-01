<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admission_request extends Model
{
    //
    protected $table = 'admission_requests';

    protected $fillable = [
        'prenom','nom', 'dateNaissance',
        'lieuNaissance','email','adresse','class_id',
        'bulletin','ine','avatar','genre','status','flag'
    ];
    public function classe() {
        return $this->belongsTo(Classe::class,'class_id');
    }

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'admission_requests';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
