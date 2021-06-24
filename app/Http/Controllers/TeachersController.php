<?php

namespace App\Http\Controllers;

use App\Models\Academic_year;
use App\Models\Assign_subject;
use App\Models\Classe;
use App\Models\Mark;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Notifications\Simple_Notifications;
use DateTime;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{

    // list des messsage recus
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

                if(request()->email == 'parent' || request()->email == 'student' || 
                        request()->email == 'teacher' || request()->email == 'supervisor' ||
                        request()->email == 'accountant' || request()->email == 'librian' ||
                        request()->email == 'admin'  )
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
    
            return redirect()->action('TeachersController@indexNotification')->with('success', 'Message bien envoyé');

    }

    // afficher les notifications non lu
    public function showNotification(Message $message)
    { 
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('TeachersController@indexNotification')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('TeachersController@indexNotification');

    }

    // marque lu une notification
    public function updateNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->action('TeachersController@indexNotification')->with('success','notification marqué comme lu ');
    }   
    // supprimer une notification  
    public function destroyNotification(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');

    }


    // liste de tes classes
    public function liste_classe(){

        $user = Auth()->user();
        
        $teacher = $user->teacher;
        
        return view('backend.'.Auth()->user()->role.'.classes.liste_classe',[
            'teacher' =>$teacher
        ]);
    }

    // liste etudiant
    public function liste_student(Assign_subject $assign_subject){

        $clause = ['subject_id' => $assign_subject->subject_id  ];
        $marks = Mark::where($clause)->get();
                  

        $students = Student::where('class_id',$assign_subject->subject->unitie->semester->classe->id )->get();
       
        return view('backend.'.Auth::user()->role.'.classes.liste_student',[
            'subject' => $assign_subject->subject,
            'students' => $students,
            'marks' => $marks
        ]);
    }
    // liste des etudiant
    public function classe(Classe $classe){

    }
    // information etudiant
    public function InfoStudent(Student $student){

            return view('backend.'.Auth::user()->role.'.classes.view_student',[
                'student'=> $student
            ]);
    }
    // enregistrement note
    public function save_note(Request $request,  Subject $subject){
       
        request()->validate([
            'typeNote' => ['required'],
            'student_id' => ['required'],
            'mark_value' => ['required']
       ]);
       
       $academic_year = Setting::where('code','academic_year')->get()->first();
       $annee_actuel = Academic_year::where('year',$academic_year->value)->get()->first();

       $clause = ['student_id'=> $request->student_id, 
                  'anneeAca_id'=> $annee_actuel->id,
                  'subject_id' =>$subject->id ]; 
       $marks = Mark::where($clause)->get();
       

       if( $marks != null && $marks->count() >= 2  ){

        $cl = ['student_id'=> $request->student_id, 
                    'anneeAca_id'=> $annee_actuel->id,
                    'subject_id' =>$subject->id,
                    'typeNote' => 'Examen'  ]; 
             $m_examen = Mark::where($cl)->get()->first();
            
             if( $m_examen != null ){
                return redirect()->back()->with('error','ce étudiant a déja une note examen');
             }
 
            return redirect()->back()->with('error','ce étudiant a déja 2 notes');
       }

       $mark = new Mark();
       $mark->subject_id = $subject->id;
       $mark->mark_value = $request->mark_value;
       $mark->typeNote = $request->typeNote;
       $mark->student_id = $request->student_id;
       $mark->anneeAca_id = $annee_actuel->id;
       $mark->save(); 

       return redirect()->back()->with('success','note étudiant bien enregistrer');
    }

    // update note 
    public function update_note(Request $request, Mark $mark){
        request()->validate([
            'typeNote' => ['required'],
            'mark_value' => ['required']
       ]);

       $mark->typeNote = $request->typeNote;
       $mark->mark_value = $request->mark_value;
       $mark->save();

       return redirect()->back()->with('success','modifiction note étudiant enregistrer');
    }

    // delete note
    public function delete_note( Mark $mark){
       
       $mark->__delete();

       return redirect()->back()->with('success','note étudiant supprimée ');
    }

    // coefficient et bareme

    public function coeff_bareme(){

       $user = Auth()->user();
       $teacher = $user->teacher;
      
        return view('backend.teacher.classes.coeff_bareme',[
            'teacher' =>$teacher
        ]);
    }
    // emploi du temps professeur 
    public function class_routine(){

        $teacher = Teacher::findOrfail(Auth()->user()->teacher->id );

        return view('backend.'.Auth()->user()->role.'.emploi_du_temps.emploi_du_temps',[
            'teacher' =>$teacher
        ]);
    }


   
}
