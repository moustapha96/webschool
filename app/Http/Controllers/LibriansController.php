<?php

namespace App\Http\Controllers;

use App\Models\Librian;
use App\Models\Message;
use App\Models\User;
use App\Notifications\Notifications;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LibriansController extends Controller
{
 
    // liste des messages 
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

            if( request()->email == 'parent' || request()->email == 'student' || 
                    request()->email == 'teacher' || request()->email == 'supervisor' ||
                    request()->email == 'accountant' || request()->email == 'librian' ||
                    request()->email == 'admin'  )
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
           

            return redirect()->action('LibriansController@indexNotification')->with('success', 'Message bien envoyé');

    }

    public function showNotification()
    { 
        if(auth()->user()->unreadNotifications->count() == 0 ){
            return redirect()->action('LibriansController@indexNotification')->with('error','Vous n\'avez pas de nouveau notification ');
        }
        return redirect()->action('LibriansController@indexNotification');
   
    }
    public function updateNotification( DatabaseNotification $notification)
    {
        $notification->markAsRead();
        
        return redirect()->action('LibriansController@indexNotification')->with('success','notification marqué comme lu ');
    }    
    public function destroyNotification(DatabaseNotification $notification)
    {
        $notification->delete();
       
        return redirect()->back()->with('success','message supprimé ');

    }
}
