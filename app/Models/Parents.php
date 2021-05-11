<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{   
    protected $fillable = [
        'user_id',
        'student_id',
    ];
        
    protected $tabme = "parents";

   public function student(){
       return $this->belongsTo(Student::class,'student_id');
   }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
