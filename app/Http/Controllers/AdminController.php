<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Accountant;
use App\Models\Book;
use App\Models\Book_categorie;
use App\Models\Book_issue;
use App\Models\Classe;
use App\Models\Contact;
use App\Models\Librian;
use App\Models\Semester;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Student_file;
use App\Models\Supervisor;
use App\Models\Teacher;
use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Type\Integer;

class AdminController extends Controller
{
   
    // librian
    public function indexLibrian()
    {
       
        $librians = Librian::latest()->get();
       
        return  view('backend.'.Auth::user()->role.'.librian.index',compact('librians'));
    }

    public function showLibrian(Librian $librian)
    {
        return view('backend.'.Auth::user()->role.'.librian.show',compact('librian'));
    }
    // accountant
    public function indexAccountant()
    {
       
        $accountants = Accountant::latest()->get();

        return  view('backend.'.Auth::user()->role.'.accountant.index',compact('accountants'));
    }
    public function showAccountant(Accountant $accountant)
    {
       
        return view('backend.'.Auth::user()->role.'.accountant.show',compact('accountant'));
    }

    // liste des Supervisor
    public function indexSupervisor()
    {

        $supervisors = Supervisor::latest()->get();

        return  view('backend.'.Auth::user()->role.'.supervisor.index',compact('supervisors'));
    }

    //afficher les details d'un supervisor
    public function showSupervisor(Supervisor $supervisor)
    {
        $this->authorize('isAdmin');

        return view('backend.'.Auth::user()->role.'.supervisor.show',compact('supervisor'));
    }



    // create user
    public function create()
    {
       
        return  view('backend.'.Auth::user()->role.'.users.create');
    }

    // afficher les details d'un emprunt   
    public function book_issu_show(Book_issue $book_issu)
    {

        $book_issue = Book_issue::find($book_issu->id)->first();
        $book = Book::find($book_issu->book_id)->first();
        $student = Student::find($book_issu->student_id)->first();

        return view('backend.'.Auth::user()->role.'.book.book_issu_show',[
            'book' =>  $book ,
            'student' =>  $student,
            'book_issu' => $book_issue
        ]);
    }

    //  liste des books empruntés
    public function indexBook_issu()
    {

        $book_issues = Book_issue::all();

        return view('backend.'.Auth::user()->role.'.book.issue',[
            'book_issues'=> $book_issues
        ]);
    }
    // liste des livres 
    public function indexBook()
    {

        $books = Book::all();

        return view('backend.'.Auth::user()->role.'.book.index',[
            'books'=> $books
        ]);
    }

    // affiche un livre 
    public function showBook(Book $book)
    {
        
        $categorie = Book_categorie::find($book->category_id)->first();
        return view('backend.'.Auth::user()->role.'.book.show',[
            'book' => $book,
            'category' => $categorie
        ]);
    }
    
    // liste parametre
    public function setting(){

        $settings = Setting::all();

        return view('backend.'.Auth()->user()->role.'.settings.setting',[
            'settings' => $settings
        ]);
    }

   

    // mettre à jour un parametre
    public function setting_update(Setting $setting){

        return view('backend.'.Auth()->user()->role.'.settings.update',[
            'setting'=> $setting
        ]);
    }
    // enregistrer un parametre
    public function setting_updated(Request $request, Setting $setting){
        
        request()->validate([
            'value' => ['required', 'string', 'max:255'],
            'desciption' => []
        ]);

            $setting_u = Setting::find($setting->id);
            $setting_u->value = $request->value;
            $setting_u->description =$request->description;
            $setting_u->save();
            return redirect()->action('AdminController@setting')->with('success','paramétre enregistré');
    }


    // liste dossier d'etudiant
    public function List_dossier(Student $student){
        
        $dossiers =  Student_file::where('student_id',$student->id)->get();

        return view('backend.'.Auth()->user()->role.'.student_file.dossier_etudiant',[
            'dossiers' =>$dossiers
        ]);
        
    }

    // bulletin de note d'un etudiant d'une année donnée
    public function bulletin_student(Student_file $student_file){

       
        $datas = $student_file->bulletin->data;

        $datas = json_decode ($student_file->bulletin->data,true);

        $filename = $student_file->student->classe->code.'-'.$student_file->student->ine;
        $classe = $student_file-> student->classe->code;

        return view('backend.'.Auth()->user()->role.'.student_file.bulletin',[
            'student_file' => $student_file,
            'datas' =>$datas
        ]);
    }

    // liste dossier etudiants
    public function Student_dossier(){

        $files = Academic_year::all();

        $students = Student::all();

        return view('backend.'.Auth()->user()->role.'.student_file.liste_etudiant',[
            'files' => $files,
            'students' =>$students
        ]);
    }
    

    
    //année académique 
    public function academic_year(){
       
        $academic_years = Academic_year::all();

        return view('backend.'.Auth()->user()->role.'.academic.academic_year',[
            'academic_years' =>$academic_years
        ]);
    }
    
    // enregistrer une année académique
    public function academic_save(Request $request){    
        request()->validate([
            'session' => ['required'],
            'year' => ['required' ,'int','unique:academic_years']
        ]);
        
        Academic_year::create(request()->all());
        return redirect()->action('AdminController@academic_year')->with('messageSuccess','L\'année académique a été ajoutée avec succès');
       
    }
    // mettre a jour l'année acaémique
    public function ay_Activate(Academic_year $academic_year){

        $year = $academic_year->year;
        $setting = Setting::where('code','academic_year')->get()->first();

        if( $setting->value >=  $academic_year->year ){
            return redirect()->back()->with('messageError','Année académique déjà terminée');
        }else{
            $setting->value=$year;
            $setting->save();
            return redirect()->back()->with('messageSuccess','Année académique bien définite dans les parametres');
        }
    }   
   
    // demande mise à jour
    public function ay_update(Academic_year $academic_year){

        $setting = Setting::where('code','academic_year')->get()->first();

        if( $setting->value >  $academic_year->year ){
            return redirect()->back()->with('error','Année académique déjà terminée');
        }else{
            return view('backend.admin.academic.update_ay',[
            'academic_year' =>$academic_year
            ]);
        }
        
    }
    // mise à jour
    public function ay_updated(Request $request,Academic_year $academic_year){

        request()->validate([
            'session' => ['required'],
            'year' => ['required' ,'int']
        ]);

        $academic_year->year = $request->year;
        $academic_year->session = $request->session;
        $academic_year->save();

        return redirect()->action('AdminController@academic_year')->with('messageSuccess','Modifications réussies');

    }

    // supprimer une année académique 
    public function delete_ay(Academic_year $academic_year){

        $setting = Setting::where('code','academic_year')->get()->first();

        if( $setting->value == $academic_year->year ){
            return redirect()->back()->with('error','Impossible de supprimer l\'année en cour ' );
        }
        $academic_year = Academic_year::find($academic_year->id);

        $academic_year->delete();

        return redirect()->back()->with('success','suppression année académique '. $academic_year->year .' réussie ');

    }


    // liste des semestres d'une classe
    public function liste_Semestre(Classe $classe){
       
        return view('backend.admin.classes.liste_semestre',compact('classe'));
    }

    // liste des UE semestre d'une classe
    public function liste_ue(Semester $semestre){

       return view('backend.admin.classes.liste_ue',compact('semestre'));
    }

    // liste des étudiant d'une classe
    public function liste_student(Classe $classe){
       
        return view('backend.admin.classes.liste_student',compact('classe'));
    }

    // détail étudiant
    public function show_student(Student $student){
       
        return view('backend.'.Auth()->user()->role.'.students.show',compact('student'));
    }

    public function liste_students(){
        $students = Student::all();

        return view('backend.admin.students.index',compact('students'));
    }
    
    
    // liste des professeurs
    public function List_teachers(){
        $teachers = Teacher::all();

        return view('backend.admin.teachers.index',compact('teachers'));
    }

    // detail professeur
    public function showTeacher(Teacher $teacher)
    {
        return view('backend.'.Auth()->user()->role.'.teachers.show',[
            'teacher'=> $teacher
        ]);
    }
    public function classe_routineTeacher(Teacher $teacher)
    {
        return view('backend.'.Auth()->user()->role.'.teachers.class_routine',[
            'teacher' =>$teacher
        ]);
        
    }

    public function liste_Contact()
    {
        $contacts = Contact::all();
        return view('backend.admin.contact.index',compact('contacts'));
    }
    public function delete_contact(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success',"contact supprimé avec succès");
    }
}
