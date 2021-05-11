<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{

    protected $table = "accountants";

    public $fillable =['matricule'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
