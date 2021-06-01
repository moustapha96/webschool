<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Librian extends Model
{

    protected $table = "librians";

    public $fillable =['matricule','flag'];

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
            $historique->object_name = 'librians';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
