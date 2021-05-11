<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Librian extends Model
{

    protected $table = "librians";

    public $fillable =['matricule'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
