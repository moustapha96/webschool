@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-book"></i> Bibliothèque</h1>
    <p>Livres >> {{ $book->name }}</p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <h2> Détail du livre </h2>
        <hr width="30%" align="left">
        <div class="form-row">



            <div class="form-group col-md-12">


                <div class="form-group row">
                    <label for="nom" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control" id="name" value="{{ $book->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nom" class="col-sm-3 col-form-label">Author</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control" id="author" value="{{ $book->author }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ISBN" class="col-sm-3 col-form-label">ISBN</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control" id="ISBN" value="{{ $book->ISBN }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adresse" class="col-sm-3 col-form-label">Quantité</label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control" id="quatite" value="{{ $book->quantity }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Categorie" class="col-sm-3 col-form-label">Categorie </label>
                    <div class="col-sm-5">
                        <input disabled type="text" class="form-control" id="Categorie" value="{{ $category->name }}">
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
