<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Classroom extends Model
{
    protected $table='classrooms';
    protected $fillable=[
        'name',
        'description','flag'
    ];

    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'classroom_id');
    }
    public function classes(){
        return $this->hasMany(Classe::class);
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'classrooms';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
