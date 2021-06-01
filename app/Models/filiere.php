<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class filiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name', 'flag'
    ];

    protected $table = 'filieres';

    public function update_flag()
    {
        if ($this->flag == true) $this->flag = false;
        else $this->flag = true;
        $this->save();
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'filieres';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}

