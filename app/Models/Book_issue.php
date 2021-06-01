<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'status', 'flag'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function __delete()
    {
        $this->flag = false;
        $this->save();

        $objet = DB::table('historicals')->where('object_id', $this->id)->first();
        if ($objet == null) {
            $historique = new historical();

            $historique->user_id = auth()::user()->id;
            $historique->object_name = 'book_issues';
            $historique->object_id = $this->id;
            $historique->save();
        }
    }
}
