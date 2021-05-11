<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_categorie extends Model
{
    protected $fillable = ['name','category_id'];

    protected function book(){
        return $this->hasMany(Book::class, 'books', 'category_id' );
    }
}
