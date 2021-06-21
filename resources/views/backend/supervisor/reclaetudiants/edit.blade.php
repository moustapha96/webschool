@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-pencil" aria-hidden="true"></i>Réclamation </h1>
    <p>Modification d'une Réclamation</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="col-sm-8 offset-sm-2">
    <div class="tile">
        <div class="tile-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="GET" action="{{ route('reclaetudiants.update', $reclaetudiant->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="idStudent">Etudiant:</label>
                    <input type="text" class="form-control" name="idStudent"
                        value="{{ $reclaetudiant->idStudent }}" />
                </div>
                <div class="form-group">
                    <label for="idRecla">Reclamation:</label>
                    <input type="text" class="form-control" name="idRecla"
                        value="{{ $reclaetudiant->idRecla }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection


