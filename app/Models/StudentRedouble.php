<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentRedouble extends Model
{
    protected $table = 'etudiants_redoublants';
    
    protected $fillable = [
        'student_id','class_id','academic_year_id','flag'
    ];
    public function student() {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function academic_year() {
        return $this->belongsTo(Academic_year::class,'academic_year_id');
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
            $historique->object_name = 'etudiants_redoublants';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
