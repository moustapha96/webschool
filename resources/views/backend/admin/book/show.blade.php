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
                                    <h1><i class="fa fa-book"></i> Bibliothèque</h1>
                                    <p>Livres >> {{ $book->name }}</p>
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
                            <h2> Détail du livre </h2>
                            <hr width="30%" align="left">
                            <div class="form-row">



                                <div class="form-group col-md-12">


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
                                        <label for="adresse" class="col-sm-3 col-form-label">Quantité</label>
                                        <div class="col-sm-5">
                                            <input disabled type="text" class="form-control" id="quatite"
                                                value="{{ $book->quantity }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Categorie" class="col-sm-3 col-form-label">Categorie </label>
                                        <div class="col-sm-5">
                                            <input disabled type="text" class="form-control" id="Categorie"
                                                value="{{ $category->name }}">
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
