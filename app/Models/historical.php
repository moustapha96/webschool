<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historical extends Model
{
    use HasFactory;

    public $table = 'historicals';
    public $fillable  = ['user_id', 'object_name', 'object_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
