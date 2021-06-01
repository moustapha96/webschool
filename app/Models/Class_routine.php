<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Class_routine extends Model
{
    protected $table='class_routines';
    protected $fillable=[
        'day',
        'start_time',
        'end_time',
        'classe_id', 
        'subject_id',
        'teacher_id',
        'classroom_id','flag'
    ];
	public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
	public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'classe_id');
    }
    
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'class_routines';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
