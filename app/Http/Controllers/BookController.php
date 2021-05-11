<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Book_categorie;
use App\Models\Book_issue;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::all();

        return view('backend.'.Auth::user()->role.'.book.index',[
            'books'=> $books
        ]);
    }

   

    public function create()
    {
        $categories = Book_categorie::all();
        
        return view('backend.'.Auth::user()->role.'.book.create',[
            'categories' => $categories
            ]);
    }
   
    public function store(Request $request)
    {
            request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'quantity' => ['required'],
            'ISBN' => ['required', 'string', 'max:255', 'unique:books'],
            'category_id' => ['required']
            ]);


        $book = new Book();
        
        $book->name = request()->name;
        $book->author = request()->author;
        $book->quantity = request()->quantity;
        $book->ISBN = request()->ISBN;
        $book->category_id = request()->category_id;
        
        $book->save();
        
        return redirect()->action('BookController@index');
        
    }

    public function show(Book $book)
    {
        $categorie = Book_categorie::find($book->category_id)->first();
        return view('backend.'.Auth::user()->role.'.book.show',[
            'book' => $book,
            'category' => $categorie
        ]);
    }

   
    // edit un livre
    public function edit($id)
    {
        $book = Book::find($id)->first();

        $categories = Book_categorie::all();

        return view('backend.'.Auth::user()->role.'.book.edit',[
            'book' => $book,
            'categories'=> $categories
        ]);
    }
    // update livre
    public function update(Request $request, Book $book)
    {
        if($book->ISBN == request()->ISBN ){

            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'author' => ['required', 'string', 'max:255'],
                'quantity' => ['required'],
                'category_id' => ['required']
              ]);
    
              $book = Book::find($book->id);
    
              $book->name = request()->name;
              $book->author = request()->author;
              $book->quantity = request()->quantity;
              $book->category_id = request()->category_id;
    
              $book->save();
        }else{
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'author' => ['required', 'string', 'max:255'],
                'quantity' => ['required'],
                'ISBN' => ['required', 'string', 'max:255', 'unique:books'],
                'category_id' => ['required']
              ]);
    
              $book = Book::find($book->id);
    
              $book->name = request()->name;
              $book->author = request()->author;
              $book->quantity = request()->quantity;
              $book->ISBN = request()->ISBN;
              $book->category_id = request()->category_id;
    
              $book->save();
        }

          return redirect()->action('BookController@index')->with('success','modification réussie');
    }

    // supprimer un livre
    public function destroy($id)
    {
         $book_issu = Book_issue::where('book_id',$id)->get();

       
         if($book_issu->count() != 0){
             return redirect()->back()->with('error','impossible de supprimer un livre emprunté');
         }else{

             $book = Book::find($id);
             $book->delete();
    
             return redirect()->action('BookController@index')->with('success','suppréssion réussie');
         }
    }
    // afficher emprunts
    public function book_issu_show(Book_issue $book_issu)
    {

        $book_issue = Book_issue::find($book_issu->id)->first();
        $book = Book::find($book_issu->book_id)->first();
        $student = Student::find($book_issu->student_id)->first();

        return view('backend.'.Auth::user()->role.'.book.book_issu_show',[
            'book' =>  $book ,
            'student' =>  $student,
            'book_issu' => $book_issu
        ]);
    }

    // editer un emprunt
    public function    book_issu_edit(Book_issue $book_issu){
       
        if($book_issu->status === 0){
            return redirect()->back()->with('error','livre déjà rendu, impossible de modifier l\'emprunt');
        }
        return view('backend.'.Auth()->user()->role.'.book.edit_book_issue',[
            'book_issu' => $book_issu
        ]);
    }

    // supprimer un emprunt
    public function    book_issu_destroy(Book_issue $book_issu){
       $book_issu->delete();
       return redirect()->back()->with('success','emprunt supprimer avec succés');
    }
    // liste des emprunts
    public function indexBook_issu()
    {
        $book_issues = Book_issue::all();

        return view('backend.'.Auth()->user()->role.'.book.issue',[
            'book_issues'=> $book_issues
        ]);
    }
    // ajouter un nouveau emprunt
    public function book_issu_new(){
        
        $students = Student::all();

        $livres = Book::all();

        return view('backend.'.Auth()->user()->role.'.book.new_book_issue',[
            'students'=>$students,
            'livres' => $livres
        ]);
    }
    
    // save nouveau emprunt
    public function book_issu_save(Request $request){
     
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
        
                return redirect()->action('BookController@indexBook_issu')->with('success','emprunt bien enregistrer');

            } else {

                return redirect()->back()->with('error','le stock de ce livre est épuisé');
            }

    }
    // rendre un livre 
    public function book_issu_return(Book_issue $book_issu){
       
        if( $book_issu->status === 0 ){
            return redirect()->back()->with('error','livre déjà rendu ');
        }else{

            $book_issu->status = False;
            $book_issu->save();
    
            return redirect()->back()->with('success','livre rendu avec succés');
        }
    }

    // mise a jour 
    public function book_issu_update(Request $request , Book_issue $book_issu){
        
        $book_issu->due_date = $request->due_date;
        $book_issu->issue_date = $request->issue_date;
        $book_issu->return_date = $request->return_date;
        $book_issu->comment = $request->comment;

        $book_issu->save();

        return redirect()->action('BookController@indexBook_issu')->with('success','emprunt mise à jour');
    }

    // ajouter un catégorie
    public function add_categorie(Request $request){
        request()->validate([
            'name' => ['required', 'string', 'unique:book_categories'],
          ]);

        Book_categorie::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success','catégorie '. $request->name .' bien ajouté');
    }

    // liste des categories
    public function index_categories(){
        $categories = Book_categorie::all();
        return view('backend.'.Auth()->user()->role.'.book.index_categorie',[
            'categories' => $categories
        ]);
    }

    // editer une categorie
    public function edit_categorie(Request $request, Book_categorie $categorie){
        request()->validate([
            'name' => ['required', 'string', 'unique:book_categories'],
          ]);

        $categorie->name = $request->name;

        $categorie->save();

        return redirect()->back()->with('success','catégorie lise à jour');

    }
    // supprimer une categorie
    public function delete_categorie(Book_categorie $categorie){
        $book = Book::where('category_id',$categorie->id)->get();
        
        if($book->count() != 0 ){
            return redirect()->back()->with('error','impossible de supprimer cette catégorie, lié à des livres');
        }else{
            $categorie->delete();
            return redirect()->action('BookController@index_categories')->with('success','catégorie bien supprimée');
        }
    }
}
