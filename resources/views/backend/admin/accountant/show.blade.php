@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i> Gestion des utilisateurs</h1>
<p>Comptables >> {{ $accountant->user->prenom . ' ' . $accountant->user->nom }}</p>

@endsection
@section('option')

@endsection
@section('option-panel')
   
@endsection
@section('data')
<div class="card-body collapse show">
    <div class="tile-body">
        <h2>Profil de {{ $accountant->user->prenom . ' ' . $accountant->user->nom }}
            @if ($accountant->user->status = 1)
                <span class="badge badge-success float-right"> Compte activé </span>
            @else
                <span class="badge badge-danger float-right"> Compte désactivé </span>
            @endif
        </h2>
        <hr width="30%" align="left">


        <div class="form-row">

            <div class="form-group col-md-3 offset-1">
                <img src="@if (file_exists($accountant->user->avatar)) {{ asset($accountant->user->avatar) }}
            @else {{ asset('/uploads/avatars/avatar.png') }} @endif"
                style="width:200px; height:200px;">
            </div>

            <div class="form-group col-md-8">
                <div class="form-group row">
                    <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->prenom }}">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->nom }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->adresse }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dateNaissance" class="col-sm-3 col-form-label">Date de Naissance</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->dateNaissance }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de Naissance</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->lieuNaissance }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->tel }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->genre }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="matricule" class="col-sm-3 col-form-label">Matricule</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->matricule }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control"
                            value="{{ $accountant->user->email }}">
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection
