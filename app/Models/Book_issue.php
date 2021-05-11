<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book_issue extends Model
{
    protected $table = "book_issues";

    protected $fillable = [
         'student_id',
         'book_id',
         'comment',
         'issue_date',
         'due_date',
         'return_date',
         'status'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function book(){
        return $this->belongsTo(Book::class,'book_id');
    }
}
