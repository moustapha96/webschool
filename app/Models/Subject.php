<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
    protected $fillable=[
        'coefficient',
        'name',
        'unity_id ','flag'
    ];

    protected $table = 'subjects';

    public function unitie(){
        return $this->belongsTo(Unitie::class,'unity_id');
    }
    public function mark(){
        return $this->hasMany(Mark::class,'subject_id');
    }
    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'subject_id');
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'subjects';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
