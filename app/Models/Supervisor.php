<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{

    protected $table = "supervisors";

    public $fillable =['matricule'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
