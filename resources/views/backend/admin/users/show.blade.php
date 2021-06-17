@extends('backend.layouts.template')


@section('title')
    <h2>Profil de {{ $user->prenom . ' ' . $user->nom }}
        <a class="btn btn-info btn-sm" title="Modifier" href="{{ route('user.edit', $user->id) }}" role="button"> <i
                class="fa fa-edit"></i></a>

        @if ($user->status == 1)
            <span class="badge badge-success float-right"> Compte activé </span>
        @else
            <span class="badge badge-danger float-right"> Compte désactivé </span>
        @endif
    </h2>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">

        <div class="tile">
            <div class="tile-body">



                <div class="form-row">

                    <div class="form-group col-md-3 offset-1">
                    <img src="@if (file_exists($user->avatar)) {{ asset($user->avatar) }} @else
                        {{ asset(get_setting('default_avatar')) }} @endif"
                        style="width:200px; height:200px;">
                    </div>
                    <div class="form-group col-md-8">
                        <div class="form-group row">
                            <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->prenom }}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->nom }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->adresse }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateNaissance" class="col-sm-3 col-form-label">Date de
                                Naissance</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->dateNaissance }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de
                                Naissance</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->lieuNaissance }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->tel }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-sm-3 col-form-label">Etat civil</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->genre }}">
                            </div>
                        </div>
                        <!--<div class="form-group row">
                                    <label for="matricule" class="col-sm-3 col-form-label">Matricule</label>
                                    <div class="col-sm-5">
                                        <input  disabled type="text"  class="form-control"
                                        value="">
                                    </div>
                                </div>-->
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-5">
                                <input disabled type="text" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>



    </div>
@endsection
