<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Assign_subject extends Model
{
    public $fillable = ['subject_id','teacher_id','flag'];
    protected $table = 'assign_subjects';


    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'assign_subjects';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
