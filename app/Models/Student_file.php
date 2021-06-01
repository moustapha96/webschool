<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Student_file extends Model
{
    protected $table ='student_files';

    protected $fillable = [
        'student_id',
        'bulletin_id',
        'document',
        'academic_year_id','flag'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function bulletin(){
        return $this->belongsTo(Bulletin::class,'bulletin_id');
    }

    public function academic_year(){
        return $this->belongsTo(Academic_year::class,'academic_year_id');
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'student_files';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
