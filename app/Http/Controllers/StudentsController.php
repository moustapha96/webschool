<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Mark;
use App\Models\Message;
use App\Models\Reclaetudiant;
use App\Models\Reclamation;
use App\Models\Student;
use App\Models\User;
use App\Notifications\Notifications;
use App\Notifications\Simple_Notifications;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{

    // emploi du temps etudiant

    public function class_routine_student(){
        $student = Auth()->user()->student;
    
        return view('backend\student\emploi\emploi_du_temps',[
            'student' => $student
        ]);
    }

    // liste de vos reclamations 
    public function indexReclamation(){
     
        $student = Auth()->user()->student;
        return view('backend\student\reclamations\index_reclamation',[
            'student'=> $student
        ]);
    }

    // faire une reclamation
    public function addReclamation(Request $request){
        request()->validate([
            'commentaire' =>['required']
        ]);

        $reclamation = new Reclamation();
        $reclamation->commentaire = $request->commentaire;
        $reclamation->dateRecla = new DateTime('now');
        $reclamation->save();

        $reclaEtu = new ReclaEtudiant();
        $reclaEtu->idStudent = Auth()->user()->student->id;
        $reclaEtu->idRecla = $reclamation->id;
        $reclaEtu->save();

        return redirect()->back()->with('success','réclamation enregistrer avec succès');

    }
    //delete rclamations
    public function deleteReclamation($id){
        $reclaEtudi = ReclaEtudiant::findOrfail($id);
        $reclaEtudi->reclamation->delete();

        $reclaEtudi->delete();
        return redirect()->back()->with('success','reclamation supprimer avec succès');

    }
    
    // notes de l'etudiant

    public function notes(){
       
        $notes = Mark::where('student_id', Auth()->user()->student->id )->get();
   
        return view('backend.'.Auth()->user()->role.'.marks.marks',[
            'notes' => $notes
        ]);
    }

    // maquette
    public function maquette(){
        $classe = Auth()->user()->student->classe;
        
        return view('backend.student.marks.maquette',[
            'classe' => $classe
        ]);
    }
  
  
    // list des messsage recu
    public function indexNotification()
    {

        $notifications_sender = DatabaseNotification::all();

        $notifications = auth()->user()->notifications;

        $users = User::all();
        return view('backend.'.Auth::user()->role.'.notifications.index',[
            'notifications'=> $notifications,
            'users' => $users,
            'notifications_sender' => $notifications_sender
        ]);
    }
    
    //  enregistrer une notificiation
    public function storeNotification(Request $request)
    {
        
        request()->validate([
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            'email' => ['required'],
        ]); 


        $files = $request->file('attachment');
          
        if($request->hasFile('attachment'))
        {
            foreach ($files as $file) {

                $filename = $file->getClientOriginalName();
                $name = "uploads/messages/" .$filename;
                $file->move(public_path('uploads/messages'), $filename);
                $data[] = $name;
            }
        }else{
            $data = [];
        }

        if( request()->email != null )
        {
            
            $message  = new Message();
            $message->subject = request()->subject;
            $message->body = request()->body;
            $message->attachment = $data;
            $message->date = new DateTime('now');

            if( request()->email == 'teacher' || request()->email == 'supervisor' ||
                    request()->email == 'accountant' || request()->email == 'librian' )
            {
                $user_group = User::where('role',request()->email)->get();
                foreach ($user_group as $user) {
                    $user->notify(new Simple_Notifications($message, auth()->user(),$user));
                }  
            }
            else {

                $user = User::where('email',request()->email)->firstorFail();
                $user->notify(new Simple_Notifications($message, auth()->user(),$user));
            }
        }
       
        return redirect()->action('StudentsController@indexNotification')->with('success', 'Message bien envoyé');

    }

    // afficher les notifications non lu
    public function showNotification(Message $message)
    {   
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('StudentsController@indexNotification')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('StudentsController@indexNotification');

    }

    // marque lu une notification
    public function updateNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->action('StudentsController@indexNotification')->with('success','notification marqué comme lu ');
    }   
    // supprimer une notification  
    public function destroyNotification(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');
    }

    // ****************code de rama gestion des etudiants *****************/

    //rama code 

    public function indexStudent()
    {
        $students = Student::all();
        return view('backend.supervisor.students.index', compact('students'));
    }
    public function create()
    {
        $user = User::where('role', 'student')->get();
        $classe = Classe::all();
        return view('backend.supervisor.students.create', compact('user','classe',$user, $classe));
    }

    // form accepter demande etudiant
    public function accepte_student($id){
        $student = Student::findOrfail($id);
        $classes = Classe::all();

        return view('backend\supervisor\students\accepte',[
                'student' =>$student,
                'classes' =>$classes
            ]);
    }

    // save demande accepter
    public function save_accepte(Request $request,$id){
        request()->validate([
            'class_id' =>['required']
        ]);
       
        $student = Student::findOrfail($id);
        $student->class_id = $request->class_id;
        $student->save();

        return redirect()->action('StudentsController@indexDA')->with('reinscription réussie ');
    }

  
    public function list($id)
    {
        $classe = Classe::findOrfail($id);
        return view('backend.supervisor.students.reinscrire', compact('classe'));
    }

    // save un etudiant
    public function storeStudent(Request $request)
    {
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required','string', 'max:9','min:9'],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'ine' => ['required'], 
            'class_id' => ['required'], 
          ]);

            $student = new Student();

            $user = new User();
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->role = 'student';
            $user->tel =  $request->tel;
            $user->adresse =  $request->adresse;
            $user->dateNaissance =  $request->dateNaissance;
            $user->lieuNaissance =  $request->lieuNaissance;
            $user->email = $request->email;
            $user->password = Hash::make('password');
            $user->save();
               
            $student->ine = $request->ine;
            $student->class_id = $request->class_id;
            $student->user_id = $user->id;
            $student->save();

            return redirect()->action('StudentsController@indexStudent')->with('success','étudiant créer avec success');
    }

    public function showStudent($id)
    {
        $student = Student::findOrfail($id);

        return view('backend.supervisor.students.show',[
            'student'=>$student
        ]);
    }
    public function editStudent($id)
    {

        $student = Student::findOrfail($id);
        $classes = Classe::all();
        return view('backend.supervisor.students.edit', compact('student','classes'));

    }

    public function updateStudent(Request $request, $id)
    {
        
        $student = Student::findOrfail($id);

        if( $student->user->email == $request->email ){

            request()->validate([
                'prenom' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'genre' => ['required', 'string'],
                'tel' => ['required','string', 'max:9','min:9'],
                'dateNaissance' => ['required', 'date'],
                'lieuNaissance' => ['required', 'string','min:3','max:100'],
                'class_id' => ['required'],
                'ine' => ['required'],
              ]);
                
                $student->user->nom = $request->nom;
                $student->user->prenom = $request->prenom;
                $student->user->tel =   $request->tel;
                $student->user->adresse =  $request->adresse;
                $student->user->genre= $request->genre;
                $student->user->dateNaissance =  $request->dateNaissance;
                $student->user->lieuNaissance =  $request->lieuNaissance;
                $student->user->save();
               
                $student->ine = $request->ine;
                $student->class_id = $request->class_id;
                $student->save();
        }

        else {
            request()->validate([
                'prenom' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'genre' => ['required', 'string'],
                'tel' => ['required','string', 'max:9','min:9'],
                'dateNaissance' => ['required', 'date'],
                'lieuNaissance' => ['required', 'string','min:3','max:100'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users'],
                'class_id' => ['required'],
                'ine' => ['required'],
              ]);
                $student->user->nom = $request->nom;
                $student->user->prenom = $request->prenom;
                $student->user->tel =   $request->tel;
                $student->user->adresse =  $request->adresse;
                $student->user->genre= $request->genre;
                $student->user->dateNaissance =  $request->dateNaissance;
                $student->user->lieuNaissance =  $request->lieuNaissance;
                $student->user->email = $request->email;
                $student->user->save();
               
                $student->ine = $request->ine;
                $student->class_id = $request->class_id;
                $student->save();

        }
        return redirect()->action('StudentsController@indexStudent')->with('success','mise en jour étudiant réussie');
    }

    public function destroyStudent($id)
    {
        $student =  Student::findOrfail($id);
        User::findOrfail($student->user_id)->delete();
        $student->delete();

        return redirect()->action('StudentsController@indexSudent')->with('success', 'étudiant supprimé');
    }

    public function createStudent(){
        $classes = Classe::all();

        return view('backend.supervisor.students.create',[
              'classes'=>$classes
            ]);
       
    }


    // demande reinscription
    public function indexDA()
    {
        $classes = Classe::all();
        return view('backend.supervisor.classes.index', compact('classes'));
    }

    public function index(){
        $students = Student::all();

        dd($students);
    }
}
