<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Semester extends Model
{
    protected $fillable = ['code', 'name', 'class_id', 'flag'];

    protected $table = 'semesters';

    public function unitie()
    {
        return $this->hasMany(Unitie::class, 'semester_id');
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
            $historique->object_name = 'semesters';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
