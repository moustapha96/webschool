<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Reclamation extends Model
{

    protected $table = 'reclamations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'dateRecla', 'commentaire', 'flag'
    ];

    public function reclamationEtudiant()
    {
        return $this->belongsTo(Reclaetudiant::class, 'idRecla');
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'reclamations';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
