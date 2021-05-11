<?php

namespace App\Http\Controllers;

use App\Models\Admission_request;
use App\Models\Classe;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdmissionRequestController extends Controller
{
    public function admission_request_liste()
    {
        $admission_requests = Admission_request::all();
     
        return view('backend.'. Auth::user()->role .'.admission_requests.index',[
            'admission_requests' => $admission_requests 
        ]);
    }

    public function create()
    {
        $classes = Classe::all();
        return view('backend.'. Auth::user()->role .'.admission_requests.create',[
            'classes' =>$classes
        ]);

    }

    public function admission_request_valider($id){
       
        $demande = Admission_request::findOrfail($id);
      
        $emails = User::where('email',$demande->email)->get()->first();
        $ines = Student::where('ine',$demande->ine)->get()->first();

       
        if( $emails != null  ){
            return redirect()->back()->with('error',"l'email que vous utiliser existe déja 
                                            ,\n veuillez contacter l'étudiant pour lui mettre au courant");
        }
        if( $ines != null  ){
            return redirect()->back()->with('error',"l'INE que vous utiliser existe déja 
                                            ,\n veuillez contacter l'étudiant pour lui mettre au courant");
        }
        $student = new Student();

        $user = new User();
        $user->nom = $demande->nom;
        $user->prenom = $demande->prenom;
        $user->role = 'student';
        $user->tel =  $demande->tel;
        $user->adresse =  $demande->adresse;
        $user->dateNaissance =  $demande->dateNaissance;
        $user->lieuNaissance =  $demande->lieuNaissance;
        $user->email = $demande->email;
        $user->password = Hash::make('password');
        $user->save();
           
        $student->ine = $demande->ine;
        $student->class_id = $demande->classe->id;
        $student->user_id = $user->id;
        $student->save();
        $demande->status = 1;
        $demande-> save();

        return redirect()->action('AdmissionRequestController@admission_request_liste')->with('success',"demande d'admission enregistrer avec succés");
    }

    public function detailDossier($id){

        $demande_admission = Admission_request::findOrfail($id);

        return view('backend.'. Auth::user()->role .'.admission_requests.show',[
            'demande_admission' => $demande_admission
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required','string', 'max:9','min:9'],
            'genre' => ['required','string', ],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string','min:3','max:100'],
            'email' => ['required', 'string', 'email', 'max:255','unique:admission_requests'],
            'class_id' =>['required'],
            'ine' =>['required'],
            'bulletin' =>'required|file'
            ]);

            $bulletin = $request->file('bulletin');
            if($request->hasFile('bulletin'))
            {
                $filename = $bulletin->getClientOriginalName();
                $bulletin_name = "uploads/demande_admissions/" .$filename;
                $bulletin->move(public_path('uploads/demande_admissions/'), $filename);
                
            }else{
               return redirect()->back()->with('error','le bulletin ne doit pas être null ');
            }

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
            $admission_request->bulletin =  $bulletin_name;
            $admission_request->ine = $request->ine;
            $admission_request->save();
        
        return redirect('/admission_requests')->with('success', 'demande d\'admission  enregistrer!');

    }

    public function admission_request_delete($id)
    {
        Admission_request::findOrfail($id)->delete();
        return redirect()->action('AdmissionRequestController@admission_request_liste')->with('success', 'Demande d\'admission supprimer avec succés ');
    }
}
