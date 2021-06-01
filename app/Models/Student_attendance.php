<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Student_attendance extends Model
{
    protected $fillable = [
        'date','attendance','student_id','class_id','flag'
    ];
    protected $table = 'student_attendances';

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'student_attendances';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
