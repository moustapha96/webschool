{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')

    <main class="app-content">

        <div class="app-title">
            <div>
                <h1><i class="fa fa-book"></i> Bibliothèque</h1>
                <p>Livres >> {{ $book->name }}</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>
            </ul>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <div class="form-row">
                            <div class="form-group col-md-12">



                                <section>
                                    <h3>Livre </h3>
                                    <div class="col-md-12">
                                        <div class="tile">
                                            <div class="tile-body">

                                                <div class="form-group row">
                                                    <label for="nom" class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="name"
                                                            value="{{ $book->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nom" class="col-sm-3 col-form-label">Author</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="author"
                                                            value="{{ $book->author }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ISBN" class="col-sm-3 col-form-label">ISBN</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="ISBN"
                                                            value="{{ $book->ISBN }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="adresse" class="col-sm-3 col-form-label">categori</label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="quatite"
                                                            value="{{ $book->categorie->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                                <section>
                                    <h2 class="exemple-h3">étudiant</h2>
                                    <div class="col-md-12">
                                        <div class="tile">
                                            <div class="tile-body">
                                                <h2>Profil de {{ $student->user->prenom . ' ' . $student->user->nom }}
                                                    @if ($student->user->status = 1)
                                                        <span class="badge badge-success float-right"> Compte activé </span>
                                                    @else
                                                        <span class="badge badge-danger float-right"> Compte désactivé
                                                        </span>
                                                    @endif
                                                </h2>
                                                <hr width="30%" align="left">


                                                <div class="form-row">

                                                    <div class="form-group col-md-3 offset-1">
                                                        <img src="@if (file_exists($student->user->avatar)) {{ asset($student->user->avatar) }}
                                                    @else {{ asset('/uploads/avatars/avatar.png') }} @endif" style="width:200px; height:200px;">
                                                    </div>

                                                    <div class="form-group col-md-8">
                                                        <div class="form-group row">
                                                            <label for="prenom"
                                                                class="col-sm-3 col-form-label">Prenom</label>
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
                                                            <label for="adresse"
                                                                class="col-sm-3 col-form-label">Adresse</label>
                                                            <div class="col-sm-5">
                                                                <input disabled type="text" class="form-control"
                                                                    value="{{ $student->user->adresse }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="dateNaissance" class="col-sm-3 col-form-label">Date
                                                                de Naissance</label>
                                                            <div class="col-sm-5">
                                                                <input disabled type="text" class="form-control"
                                                                    value="{{ $student->user->dateNaissance }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu
                                                                de Naissance</label>
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
                                </section>
                                <section>
                                    <h3 class="exemple-h3">Emprunt </h3>
                                    <div class="col-md-12">
                                        <div class="tile">
                                            <div class="tile-body">
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-3 col-form-label">Date emprunt
                                                    </label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="Categorie"
                                                            value="{{ $book_issu->issue_date }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-3 col-form-label">Due date </label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="Categorie"
                                                            value="{{ $book_issu->due_date }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-3 col-form-label">return Dat
                                                    </label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="Categorie"
                                                            value="{{ $book_issu->return_date }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-3 col-form-label">comment </label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="Categorie"
                                                            value="{{ $book_issu->comment }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="Categorie" class="col-sm-3 col-form-label">Status </label>
                                                    <div class="col-sm-5">
                                                        <input disabled type="text" class="form-control" id="Categorie"
                                                            value="{{ $book_issu->status }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection


@section('scripts')

@endsection --}}


{{-- code Bara datable --}}

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
                            <div class="app-title">
                                <div>
                                    <h1><i class="fa fa-book"></i> Bibliothèque</h1>
                                    <p>Livres >> {{ $book->name }}</p>
                                </div>
                                <ul class="app-breadcrumb breadcrumb">
                                    <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                                                class="fa fa-reply"></i> Retour</a></li>
                                </ul>
                    
                            </div>
                        </div>
                    </div>
                    <div class="tile">
                        <div class="tile-body">

                            <div class="form-row">
                                <div class="form-group col-md-12">



                                    <section>
                                        <h3>Livre </h3>
                                        <div class="col-md-12">
                                            <div class="tile">
                                                <div class="tile-body">

                                                    <div class="form-group row">
                                                        <label for="nom" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="name"
                                                                value="{{ $book->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nom" class="col-sm-3 col-form-label">Author</label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="author"
                                                                value="{{ $book->author }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="ISBN" class="col-sm-3 col-form-label">ISBN</label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="ISBN"
                                                                value="{{ $book->ISBN }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="adresse"
                                                            class="col-sm-3 col-form-label">categori</label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="quatite"
                                                                value="{{ $book->categorie->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <section>
                                        <h2 class="exemple-h3">étudiant</h2>
                                        <div class="col-md-12">
                                            <div class="tile">
                                                <div class="tile-body">
                                                    <h2>Profil de {{ $student->user->prenom . ' ' . $student->user->nom }}
                                                        @if ($student->user->status = 1)
                                                            <span class="badge badge-success float-right"> Compte activé
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger float-right"> Compte désactivé
                                                            </span>
                                                        @endif
                                                    </h2>
                                                    <hr width="30%" align="left">


                                                    <div class="form-row">

                                                        <div class="form-group col-md-3 offset-1">
                                                            <img src="@if (file_exists($student->user->avatar)) {{ asset($student->user->avatar) }}
                                                        @else {{ asset('/uploads/avatars/avatar.png') }} @endif" style="width:200px; height:200px;">
                                                        </div>

                                                        <div class="form-group col-md-8">
                                                            <div class="form-group row">
                                                                <label for="prenom"
                                                                    class="col-sm-3 col-form-label">Prenom</label>
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
                                                                <label for="adresse"
                                                                    class="col-sm-3 col-form-label">Adresse</label>
                                                                <div class="col-sm-5">
                                                                    <input disabled type="text" class="form-control"
                                                                        value="{{ $student->user->adresse }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="dateNaissance"
                                                                    class="col-sm-3 col-form-label">Date de
                                                                    Naissance</label>
                                                                <div class="col-sm-5">
                                                                    <input disabled type="text" class="form-control"
                                                                        value="{{ $student->user->dateNaissance }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="lieuNaissance"
                                                                    class="col-sm-3 col-form-label">Lieu de
                                                                    Naissance</label>
                                                                <div class="col-sm-5">
                                                                    <input disabled type="text" class="form-control"
                                                                        value="{{ $student->user->lieuNaissance }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="tel" class="col-sm-3 col-form-label">TEL
                                                                    :</label>
                                                                <div class="col-sm-5">
                                                                    <input disabled type="text" class="form-control"
                                                                        value="{{ $student->user->tel }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="genre"
                                                                    class="col-sm-3 col-form-label">Genre</label>
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
                                                                <label for="email"
                                                                    class="col-sm-3 col-form-label">Email</label>
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
                                    </section>
                                    <section>
                                        <h3 class="exemple-h3">Emprunt </h3>
                                        <div class="col-md-12">
                                            <div class="tile">
                                                <div class="tile-body">
                                                    <div class="form-group row">
                                                        <label for="Categorie" class="col-sm-3 col-form-label">Date emprunt
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="Categorie"
                                                                value="{{ $book_issu->issue_date }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Categorie" class="col-sm-3 col-form-label">Due date
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="Categorie"
                                                                value="{{ $book_issu->due_date }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Categorie" class="col-sm-3 col-form-label">return Dat
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="Categorie"
                                                                value="{{ $book_issu->return_date }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Categorie" class="col-sm-3 col-form-label">comment
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="Categorie"
                                                                value="{{ $book_issu->comment }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Categorie" class="col-sm-3 col-form-label">Status
                                                        </label>
                                                        <div class="col-sm-5">
                                                            <input disabled type="text" class="form-control" id="Categorie"
                                                                value="{{ $book_issu->status }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


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
