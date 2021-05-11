<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academic_year extends Model
{
    protected $table = 'academic_years';

    protected $fillable = [
        'session',
        'year',
    ];

   
}
