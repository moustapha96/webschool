<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected  $fillable =['name','author','ISBN','quantity'];

    protected function categorie(){
        return $this->belongsTo(Book_categorie::class,'category_id');
    }
}
