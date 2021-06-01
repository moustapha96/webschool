<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Parents extends Model
{   
    protected $fillable = [
        'user_id',
        'student_id','flag'
    ];
        
    protected $tabme = "parents";

   public function student(){
       return $this->belongsTo(Student::class,'student_id');
   }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'parents';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
