<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Admission_request;
use App\Models\Book;
use App\Models\Book_issue;
use App\Models\Classe;
use App\Models\Classroom;
use App\Models\Contact;
use App\Models\Group_message;
use App\Models\Librian as ModelsLibrian;
use App\Models\Parents;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Student_attendance;
use App\Models\Student_file;
use App\Models\Subject;
use App\Models\Supervisor as ModelsSupervisor;
use App\Models\Teacher;
use App\Models\User;
use App\Models\User_message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	// return view('backend.'. Auth::user()->role .'.dashboard.index');
        $students = Student::all();
        $classes = Classe::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        $academic_year = Setting::where('code','academic_year')->get()->first();
        $subjects = Subject::all();
       

        
        $c_f = ['genre'=> 'Féminin',
                    'role' => 'student' ];
        $c_m = ['genre'=> 'Masculin',
                    'role' => 'student' ];
        $filles = User::where($c_f)->get();
        $garcons = User::where($c_m)->get();
      
         $abscence = Student_attendance::all();
         $livres = Book::all();
         $student_files = Student_file::all();
         $livres_emprunte = Book_issue::all();

         $supervisors = ModelsSupervisor::all();

         $librians = ModelsLibrian::all();

         

         $date = Carbon::now();
         $parents = Parents::where('user_id',Auth()->user()->id)->get();


         if( $classes != null){

             foreach ($classes as $classe) {
                 $label = [$classe->nameClass];
             }
         }else{
             $label = 'null';
         }

    	$title = "Tableau de bord";
    	return view('backend.'. Auth::user()->role .'.dashboard.index', [
            'title' => $title,
            'students' => $students,
            'classes' => $classes ,
            'classrooms' => $classrooms,
            'teachers' => $teachers ,
            'academic_year' => $academic_year,
            'subjects' => $subjects,
            'filles' => $filles,
            'garcons' => $garcons,
            'abscence' => $abscence,
            'livres' => $livres,
             'livres_emprunte' => $livres_emprunte,
            'student_files' => $student_files,
            'date'=>$date,
            //'label' => $label,
            'parents' => $parents,
            'supervisors' =>$supervisors,
            'librians' => $librians
        ]);
    }
}
