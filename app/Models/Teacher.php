<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    
    
    public $fillable = ['matriculeProfesseur','flag'];

    protected $table = 'teachers';
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function assign_subject(){
        return $this->hasMany(Assign_subject::class,'teacher_id');
    }
    public function class_routines(){
        return $this->hasMany(Class_routine::class, 'teacher_id');
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'teachers';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
