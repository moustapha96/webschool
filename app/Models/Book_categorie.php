<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Book_categorie extends Model
{
    protected $fillable = ['name','category_id','flag'];

    protected $tabme ="book_categories";

    protected function book(){
        return $this->hasMany(Book::class, 'books', 'category_id' );
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = Auth::user()->id;
            $historique->object_name = 'book_categories';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
