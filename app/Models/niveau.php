<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class niveau extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name','flag'
    ];

    protected $table = 'niveaux';

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'niveaux';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
