@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Liste des UE </h1>
    <p>Unité d'enseignement</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="table-responsive">
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Nom: </strong>
                    {{ $unity->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Code: </strong>
                    {{ $unity->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


