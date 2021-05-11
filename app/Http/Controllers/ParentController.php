<?php

namespace App\Http\Controllers;

use App\Models\Admission_request;
use App\Models\Classe;
use App\Models\Mark;
use App\Models\Message;
use App\Models\Parents;
use App\Models\Student;
use App\Models\User;
use App\Notifications\Simple_Notifications;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
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
    
            return redirect()->action('ParentController@indexNotification')->with('success', 'Message bien envoyé');

    }

    // afficher les notifications non lu
    public function showNotification()
    {   
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('ParentController@indexNotification')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('ParentController@indexNotification');
    }

    // marque lu une notification
    public function updateNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->action('ParentController@indexNotification')->with('success','notification marqué comme lu ');
    }   
    // supprimer une notification  
    public function destroyNotification(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');

    }


    // liste de ces étudiant
    public function list_student(){

        $parents = Parents::where('user_id',Auth()->user()->id)->get();

        return view('backend.'.Auth()->user()->role.'.etudiant.index_etudiant',[
            'parents' => $parents
        ]);
        
    }    
    // note de l'etudiant   
    public function note_student(Student $student){

    
        $notes = Mark::where('student_id',$student->id )->get();
        
        $datas = json_decode ($student->bulletin->data,true);

        return view('backend.'.Auth()->user()->role.'.etudiant.note_etudiant',[
            'student'=> $student,
            'notes'=> $notes
        ]);
    }

    // demande admission 
    public function DemandeAdmission(){
        $classes = Classe::all();

        return view('backend.'.Auth()->user()->role.'.demande_admission.demander',[
            'classes' => $classes
        ]);
    }

    // envoie du demande
    public function SendDemandeAdmission(Request $request){
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required'],
            'genre' => ['required','string', ],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255','unique:admission_requests'],
            'class_id' =>['required'],
            'ine' =>['required'],
            'bulletin' =>'required|file'
            ]);

            $admission_request = new Admission_request();
            
            $admission_request->nom = $request->nom;
            $admission_request->prenom = $request->prenom;
            $admission_request->tel =   $request->tel;
            $admission_request->adresse =  $request->adresse;
            $admission_request->genre =  $request->genre;
            $admission_request->dateNaissance =  $request->dateNaissance;
            $admission_request->lieuNaissance =  $request->lieuNaissance;
            $admission_request->email = $request->email;
            $admission_request->class_id =  $request->class_id;
            $admission_request->bulletin = $request->bulletin;
            $admission_request->ine = $request->ine;
            $admission_request->save();
        
        $title = "Tableau de bord Parent";
        return view('backend.'. Auth::user()->role .'.dashboard.index', [
            'title' => $title,
        ])->with('success', "demande d'admission envoyé");
    }
}