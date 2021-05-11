@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i>Liste des Abscences </h1>
            <p>Modification d'une abscence</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

        </ul>
    </div>
  <div class="row">
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
        <form method="Post" action="{{ route('student_attendances.update', $student_attendance->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="idStudent">Etudiant:</label>
                <input type="text" class="form-control" name="idStudent" value="{{ $student_attendance->idStudent }}" />
            </div>
            <div class="form-group">
                <label for="idClasse">Classe:</label>
                <input type="text" class="form-control" name="idClasse" value="{{ $student_attendance->idClasse }}" />
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="dateTime" class="form-control" name="date" value="{{ $student_attendance->date }}" />
            </div>
            <div class="form-group">
                <label for="commentaire">Commentaire:</label>
                <input type="text" class="form-control" name="commentaire" value="{{ $student_attendance->commentaire }}" />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


@section('scripts')

@endsection
