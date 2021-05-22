{{-- @extends('backend.layouts.main')


@section('styles')

@endsection


@section('main')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1><i class="fa fa-suitcase"></i>Gestion étudiants </h1>
                                    <p>Détail d'un étudiant</p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-primary float-right" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <div class="col-md-12">
                                <div class="tile">
                                    <div class="tile-body">
                                        <h2>Profil de {{ $student->user->prenom . ' ' . $student->user->nom }}
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
                                            @else {{ asset('/uploads/avatars/avatar.png') }} @endif"
                                                style="width:200px;
                                                height:200px;">
                                            </div>

                                            <div class="form-group col-md-8">
                                                <div class="form-group row">
                                                    <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->prenom }}">
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->nom }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->adresse }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="dateNaissance" class="col-sm-3 col-form-label">Date de
                                                        Naissance</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->dateNaissance }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de
                                                        Naissance</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->lieuNaissance }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->tel }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->genre }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ine" class="col-sm-3 col-form-label">INE</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->ine }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control"
                                                            value="{{ $student->user->email }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection --}}



@extends('backend.layouts.main')


@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection


@section('main')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1><i class="fa fa-suitcase"></i>Gestion étudiants </h1>
                                    <p>Profil d'un étudiant</p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-primary float-right" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a>
                                </div>
                            </div>

                            <hr>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <div class="tile-body">
                                <h2>Profil de {{ $student->user->prenom . ' ' . $student->user->nom }}
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
                                    @else {{ asset('/uploads/avatars/avatar.png') }} @endif"
                                        style="width:200px;
                                        height:200px;">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <div class="form-group row">
                                            <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->prenom }}">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->nom }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->adresse }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dateNaissance" class="col-sm-3 col-form-label">Date de
                                                Naissance</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->dateNaissance }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de
                                                Naissance</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->lieuNaissance }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->tel }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->genre }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ine" class="col-sm-3 col-form-label">INE</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->ine }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-5">
                                                <input disabled type="text" class="form-control"
                                                    value="{{ $student->user->email }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>

@endsection