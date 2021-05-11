
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">

  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Info étudiant</h1>
        <h4 class="mt-2" > {{ $student->user->prenom }}{{ $student->user->nom }}  </h4
        <h5> Classe : {{ $student->classe->nameClass }}  </h5>
    </div>
    <ul class="app-breadcrumb breadcrumb">
       <li class="breadcrumb-item"> 
        <a href="{{ url()->previous() }}" class="btn btn-outline-dark" role="button" >retour</a>
   </li>
    </ul> 
  </div>

  <div class="col-md-12">
    <div class="tile">
        <div class="tile-body">
            <h2>Profil de {{ $student->user->prenom . ' '. $student->user->nom }}
                @if ($student->user->status = 1)
                <span class="badge badge-success float-right"> Compte activé </span>
                @else
                <span class="badge badge-danger float-right"> Compte désactivé </span>
                @endif
            </h2>
            <hr width="30%" align="left">


            <div class="form-row">

                <div class="form-group col-md-3 offset-1">
                    <img src="@if (file_exists($student->user->avatar)) {{ asset($student->user->avatar) }} 
                      @else {{  asset('/uploads/avatars/avatar.png')}} @endif" style="width:200px; height:200px;">
                </div>

                <div class="form-group col-md-8">
                    <div class="form-group row">
                        <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->prenom }}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->nom }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->adresse }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dateNaissance" class="col-sm-3 col-form-label">Date de Naissance</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->dateNaissance }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de Naissance</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->lieuNaissance }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->tel }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->genre }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ine" class="col-sm-3 col-form-label">INE</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->ine }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input  disabled type="text"  class="form-control" 
                            value="{{ $student->user->email }}">
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
</main>
@endsection




