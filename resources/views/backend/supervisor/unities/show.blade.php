@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Liste des UE </h1>
        <p>Unité d'enseignement</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
         <div class = "card-body">
           <div class = "row">
                <div class = "col-xs-12 col-sm-12 col-md-12">
                    <div class = "form-group">
                        <strong> Nom: </strong>
                        {{ $unity->name}}
                    </div>
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-12">
                    <div class = "form-group">
                        <strong> Code: </strong>
                        {{ $unity->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
