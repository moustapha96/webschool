<?php

namespace App\Http\Controllers;

use App\Models\Accountant;
use App\Models\Librian;
use App\Models\Parents;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $title = 'Liste des utilisateurs';
        $activeMain = 'users';

        return  view('backend.' . Auth::user()->role . '.users.index', compact('users', 'title', 'activeMain'));
    }

    public function create()
    {

        $activeMain = "newUser";
        $title = 'Ajouter un utilisateurs';
        return view('backend.' . Auth::user()->role . '.users.create', compact('title', 'activeMain'));
    }


    public function myProfil()
    {

        $user = Auth::user();
        return view('backend.profil.index')->with('user', $user);
    }

    public function update_avatar(Request $request)
    {

        $this->validate($request, [
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $logo = $request->file('logo');

        if (($request->file('logo') != null) && $logo->isValid()) {
            $filename = Auth()->user()->id . '_' . time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/avatars'), $filename);


            $user = Auth::user();
            $user->avatar = "uploads/avatars/" . $filename;;
            $user->save();
        } else {
            return redirect()->back()->with('messageError', 'photo profil non enregistré');
        }


        return redirect()->back()->with('messageSuccess', 'photo profil mise en jour avec succès');
    }

    public function photo_user(Request $request, $id)
    {

        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $filename = $id . '_' . time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('uploads/avatars'), $filename);

        $user = User::find($id);
        $user->avatar = "uploads/avatars/" . $filename;
        $user->save();


        return redirect()->back()->with('messageSuccess', 'photo prifil mise à jour avec succés');
    }

    public function update_profil(Request $request)
    {

        $user = Auth::user();


        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:9', 'min:9'],
            'genre' => ['required', 'string',],
            'dateNaissance' => ['required', 'date'],
            'status' => ['required'],
            'lieuNaissance' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);


        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel =   $request->tel;
        $user->adresse =  $request->adresse;
        $user->genre =  $request->genre;
        $user->dateNaissance =  $request->dateNaissance;
        $user->lieuNaissance =  $request->lieuNaissance;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        return redirect()->action('UsersController@index')->with('messageSuccess', 'Les modifications ont été enregistrées avec succès !');
    }


    public function pwd()
    {

        $user = Auth::user();
        $title = "Modifier le mot de passe";
        return view('backend.profil.mdp', compact("user", "title"));
    }

    public function update_pwd(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        User::find($id)->update(['password' => Hash::make($request->password)]);

        return redirect()->action('UsersController@pwd')->with('messageSuccess', 'Le mot de passe a été modifié avec succès !');
    }




    public function store(Request $request)
    {

        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:9', 'min:9'],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        $role = $request->role;

        $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->role =    $request->role;
        $user->tel =   $request->tel;
        $user->adresse =  $request->adresse;
        $user->dateNaissance =  $request->dateNaissance;
        $user->lieuNaissance =  $request->lieuNaissance;
        $user->email = $request->email;
        $user->genre = $request->genre;
        $user->password = Hash::make($request->password);
        $user->save();

        $id = $user->id;
        $date =  date('Y');
        $messageSuccess = "L'utilisateur a été enregistré avec succès !";


        if ($role === 'accountant') {
            $caractere = 'C';
            $matricule = $caractere . $id . $date;
            $compte = new  Accountant();
            $compte->matricule = $matricule;
            $compte->user_id = $user->id;
            $user->accountant()->save($compte);
        } else if ($role == 'supervisor') {
            $caractere = 'S';
            $matricule = $caractere . $id . $date;
            $compte = new  Supervisor();
            $compte->matricule = $matricule;
            $compte->user_id = $user->id;
            $user->supervisor()->save($compte);
        } else if ($role === 'librian') {
            $caractere = 'B';
            $matricule = $caractere . $id . $date;
            $compte = new  Librian();
            $compte->matricule = $matricule;
            $compte->user_id = $user->id;
            $user->librian()->save($compte);
        }


        //return back();
        return redirect()->route('admin.users.show', [$user->id])->with('messageSuccess', $messageSuccess);

    }

    public function show($user_id)
    {

        $user  = User::find($user_id);
        $title = "Profil utilisateur";
        $activeMain = 'users';
        return view('backend.' . Auth::user()->role . '.users.show', compact('user', 'title', 'activeMain'));
    }

    public function edit($user_id)
    {

        $user  = User::find($user_id);
        $title = "Modifier un profil";
        $activeMain = 'users';

        return view('backend.' . Auth::user()->role . '.users.edit', compact('user', 'title', 'activeMain'));
    }

    public function update_user(Request $request, $id)
    {

        $user = User::findOrFail($id);

        request()->validate([
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:9', 'min:9'],
            'genre' => ['required', 'string',],
            'dateNaissance' => ['required', 'date'],
            'lieuNaissance' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);


        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->tel =   $request->tel;
        $user->adresse =  $request->adresse;
        $user->genre =  $request->genre;
        $user->dateNaissance =  $request->dateNaissance;
        $user->lieuNaissance =  $request->lieuNaissance;
        $user->email = $request->email;
        $user->status = $request->status;

        if (strlen($request->password) >= 8) {
            $user->password = $request->password;
        }
        $user->save();
        $messageSuccess = "Les modification ont été enregistrées avec succès !";


        //return view('backend.' . Auth::user()->role . '.users.show', compact('messageSuccess'));
        return redirect()->route('admin.users.show', [$user->id])->with('messageSuccess', $messageSuccess);
    }



    public function changeStatus(Request $request)
    {

        $user = User::find($request->user_id);

        $user->status = $request->status;
        $user->save();

        return redirect()->back();
    }
}
