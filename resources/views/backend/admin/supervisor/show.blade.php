@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i> Gestion des utilisateurs</h1>
    <p>Responsables Pédagogiques >> {{ $supervisor->user->prenom . ' ' . $supervisor->user->nom }}</p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <h2>Profil de {{ $supervisor->user->prenom . ' ' . $supervisor->user->nom }}
                    @if ($supervisor->user->status == 1)
                        <span class="badge badge-success float-right"> Compte activé </span>
                    @else
                        <span class="badge badge-danger float-right"> Compte désactivé </span>
                    @endif
                </h2>
                <hr width="30%" align="left">


                <div class="form-row">

                    <div class="form-group col-md-3 offset-1">
                        <img src="@if (file_exists($supervisor->user->avatar)) {{ asset($supervisor->user->avatar) }}
                    @else {{ asset('/uploads/avatars/avatar.png') }} @endif" style="width:200px;
                        height:200px;">
                    </div>
                    <div class="form-group col-md-8">
                        <div class="form-group row">
                            <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->user->prenom }}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->user->nom }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->user->adresse }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateNaissance" class="col-sm-3 col-form-label">Date de Naissance</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control"
                                    value="{{ $supervisor->user->dateNaissance }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de Naissance</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control"
                                    value="{{ $supervisor->user->lieuNaissance }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->user->tel }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->user->genre }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matricule" class="col-sm-3 col-form-label">Matricule</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->matricule }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $supervisor->user->email }}">
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
