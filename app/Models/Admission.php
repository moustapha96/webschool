<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    //
    protected $table = 'admissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idAdmission_request',
    ];
    
    public function admission_requests() {
        return $this->belongsTo(Admission_request::class,'idAdmission_request');
    }

}
