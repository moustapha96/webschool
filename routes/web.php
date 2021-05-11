<?php

use Illuminate\Support\Facades\Route;


use App\Models\Admission_request;
use App\Models\Classe;
use App\Models\Contact;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// page d'accueil
Route::get('/', function () {
	return view('frontend.welcome');
})->name('accueil');

// page login
Route::get('/login', function () {
	return view('auth.login');
});

// enregistrement des contacts
Route::post('contact/message/', function(Request $request){

	request()->validate([
		'prenom' => ['required', 'string', 'max:255'],
		'nom' => ['required', 'string', 'max:255'],
		'adresse' => ['required', 'string', 'max:255'],
		'email' => ['required', 'string', 'email', 'max:255','unique:admission_requests'],
		'message'=>['required']
		]);

		Contact::create($request->all());

	return redirect()->back()->with('success', "votre demande message est bien transmi ");

})->name('contact_envoie');


Route::get('/admission', function () {
	$classes = Classe::all();
	return view('frontend.admission',compact('classes'));
})->name('admission');


Route::post('admission/envoie demande/', function(Request $request){

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

			$filename =time().''.$bulletin->getClientOriginalName();
			$bulletin_name = "uploads/demande_admissions/" .$filename;
			$bulletin->move(public_path('uploads/demande_admissions/'), $filename);

		}else{
		   return redirect()->back()->with('error',"vous n'avez pas renseigner le bulletin ");
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

	return redirect("/")->with('success', 'votre demande d\'admission a été envoyé avec succés');

})->name('admission_envoie');

Route::get('/error',function(){
	return view('errors.error');
});
Route::get('/non-autoriser',function(){
	return view('errors.notAuthorised');
});


Auth::routes(['verify' => true]);


//TOUTES LES ROUTES QUI NECESSITENT ETRE CONNECTÉ SONT PLACEES ICI
Route::group(['middleware' => ['auth']], function ()
{
	Route::get('/home', 'HomeController@index')->name('home');
});
