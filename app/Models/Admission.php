<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admission extends Model
{
    //
    protected $table = 'admissions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'idAdmission_request','flag'
    ];
    
    public function admission_requests() {
        return $this->belongsTo(Admission_request::class,'idAdmission_request');
    }

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'admissions';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
