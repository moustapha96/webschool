<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Reclaetudiant extends Model
{
    //
    protected $table = 'reclaetudiants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idStudent','idRecla','flag'
    ];

    public function student() {
        return $this->belongsTo(Student::class,'idStudent');
    }
    public function reclamation() {
        return $this->belongsTo(Reclamation::class,'idRecla');
    }

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'reclaetudiants';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
