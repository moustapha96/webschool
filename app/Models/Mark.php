<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mark extends Model
{
    protected $fillable = [
                'mark_value',
                'typeNote',
                'student_id',
                'anneeAca_id','flag'
            ];

    protected $table = 'marks';

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function students(){
        return $this->hasOne(Student::class,'student_id');
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
            $historique->object_name = 'librians';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
    
}
