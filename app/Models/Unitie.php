<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Unitie extends Model
{
    protected $fillable = [
        'code',
        'name',
        'credit',
        'semester_id',
        'class_id', 'flag'
    ];

    protected $table = 'unities';


    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, 'unity_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }



    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'unities';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
