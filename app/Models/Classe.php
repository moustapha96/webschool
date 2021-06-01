<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Classe extends Model
{
    protected $fillable = [
        'nameClass','niveau','classroom_id','flag'
    ];

   public function student(){
        return $this->hasMany(Student::class,'class_id');
   }

    public function mark(){
        return $this->hasMany(Mark::class,'class_id');
    }

    public function marks(){
        return $this->hasMany(Mark::class,'class_id');
    }
    public function semester(){
        return $this->hasMany(Semester::class,'class_id');
    }

    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'classe_id');
    }
    
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'classes';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
