@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-calendar" aria-hidden="true"></i>Emploie du temps</h1>
<h4 class="mt-2">Choix de la classe</h4>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="tile">
    <div class="tile-body">

    <form class="form-group"  action="{{ route('emploi.list') }}" method="POST">
     @csrf

        <div class="form-row">
            <div class="form-group col-md-2">
                <h3 for="classe"> Classe : </h3>
            </div>
            <div class="form-group col-md-7">
              <select id="code" name="code" class="form-control">
                @foreach($classes as $classe )
                  <option value="{{ $classe->id }}"> {{ $classe->niveau->code.' '. $classe->filiere->code }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary" role="search" > VOIR EMPLOI DU TEMPS</button>
            </div>
        </div>
    </form>
    </div>
  </div>
@endsection
