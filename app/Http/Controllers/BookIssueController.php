<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_issue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_issues = Book_issue::all();

        return view('backend.'.Auth()->user()->role.'.book_issue.index',[
            'book_issues'=> $book_issues
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $students = Student::all();

        $livres = Book::all();

        return view('backend.'.Auth()->user()->role.'.book_issue.create',[
            'students'=>$students,
            'livres' => $livres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'comment' => ['required', 'string', 'max:255'],
            'due_date' => ['required'],
            'issue_date' => ['required'],
            'return_date' => ['required']
        ]);
    
        $book = Book::find($request->book_id);
        
        $clause = ['book_id' => $request->book_id, 'status' => '1'];

        $books_i = Book_issue::where($clause)->get();

        if( $books_i == null || $books_i->count() < $book->quantity ){

            $book_issue = new Book_issue();

            $book_issue->student_id = $request->student_id;
            $book_issue->book_id = $request->book_id;
            $book_issue->student_id = $request->student_id;
            $book_issue->comment = $request->comment;
            $book_issue->due_date = $request->due_date;
            $book_issue->return_date = $request->return_date;
            $book_issue->issue_date = $request->issue_date;
            $book_issue->status = true;
    
            $book_issue->save();
    
            return redirect()->action('BookIssueController@index')->with('success','emprunt bien enregistrer');

        } else {

            return redirect()->back()->with('error','le stock de ce livre est épuisé');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function show(Book_issue $book_issue)
    {
        // $book_issue = Book_issue::find($book_issue->id)->first();
        $book = Book::find($book_issue->book_id)->first();
        $student = Student::find($book_issue->student_id)->first();

        return view('backend.'.Auth::user()->role.'.book_issue.show',[
            'book' =>  $book ,
            'student' =>  $student,
            'book_issue' => $book_issue
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Book_issue $book_issue)
    {
        if($book_issue->status === 0){
            return redirect()->back()->with('error','livre déjà rendu, impossible de modifier l\'emprunt');
        }
        return view('backend.'.Auth()->user()->role.'.book_issue.edit',[
            'book_issue' => $book_issue
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book_issue $book_issue)
    {
        $book_issue->due_date = $request->due_date;
        $book_issue->issue_date = $request->issue_date;
        $book_issue->return_date = $request->return_date;
        $book_issue->comment = $request->comment;

        $book_issue->save();

        return redirect()->action('BookIssueController@index')->with('success','emprunt mise à jour');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book_issue  $book_issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book_issue $book_issue)
    {
        $book_issue->delete();
        return redirect()->back()->with('success','emprunt supprimer avec succés');
    }
    public function returnBook(Book_issue $book_issue){

    }

    public function return(Book_issue $book_issue){
        if( $book_issue->status === 0 ){
            return redirect()->back()->with('error','livre déjà rendu ');
        }else{

            $book_issue->status = False;
            $book_issue->save();
    
            return redirect()->back()->with('success','livre rendu avec succés');
        }
    }
}
