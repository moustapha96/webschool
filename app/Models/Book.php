<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected  $fillable =['name','author','ISBN','quantity','flag'];

    protected $table="books";
    protected function categorie(){
        return $this->belongsTo(Book_categorie::class,'category_id');
    }

    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'books';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
