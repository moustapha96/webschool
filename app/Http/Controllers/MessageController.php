<?php

namespace App\Http\Controllers;

use App\Apps\Models\Group_message as ModelsGroup_message;
use App\Mail\Notification;
use App\Models\Accountant;
use App\Models\Group_message;
use App\Models\Librian;
use App\Models\Message;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use App\Notifications\Notifications;
use DateTime;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator as ValidationValidator;

class MessageController extends Controller
{
  
    public function index()
    {
        $m_recu =  auth()->user()->notifications()->get();

        $notifications = DatabaseNotification::all();

       
        $users = User::all();
        return view('backend.'.Auth::user()->role.'.notifications.index',[
            'notifications'=> $notifications,
            'users' => $users,
            'm_recu' => $m_recu
        ]);
    }
 
    public function store(Request $request)
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
                        request()->email == 'admin' )
                {
                    $user_group = User::where('role',request()->email)->get();
                    foreach ($user_group as $user) {
                        $user->notify(new Notifications($message, auth()->user(),$user));
                    }  
                }
                else {

                    $user = User::where('email',request()->email)->firstorFail();
                    $user->notify(new Notifications($message, auth()->user(),$user));
                }
            }
           

            return redirect()->action('MessageController@index')->with('success', 'Message bien envoyé');

    }

    public function show()
    { 
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('MessageController@index')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('MessageController@index');

    }
   
    public function updateNotification( DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->action('MessageController@index')->with('success','notification marqué comme lu ');
    }
    
    public function destroy(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');
    }

    public function deleteAllNotification(Request $request)
    {
       
        $ids = $request->ids;
        $data = [];
        
        if( $ids == null ){
            return redirect()->back()->with('error','auncun message n\'a été sélectionné');
        }
        foreach ($ids as$id) {
             
            $data[] = DB::Table('notifications')->where('id',$id)->get()->first();  
        }

        foreach ($data as $d) {
            DatabaseNotification::find($d->id)->get()->first()->delete();
        }
       
        return redirect()->back()->with('success','messgaes bien supprimés');

    }
}
