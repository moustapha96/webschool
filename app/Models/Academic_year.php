<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Academic_year extends Model
{
    protected $table = 'academic_years';

    protected $fillable = [
        'session',
        'year',
    ];

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'academic_years';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
