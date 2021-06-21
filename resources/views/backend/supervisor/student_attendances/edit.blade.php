@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-user"></i>Liste des Abscences </h1>
    <p>Modification d'une abscence</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<form method="Post" action="{{ route('student_attendances.update', $student_attendance->id) }}">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="idStudent">Etudiant:</label>
        <input type="text" class="form-control" name="idStudent"
            value="{{ $student_attendance->idStudent }}" />
    </div>
    <div class="form-group">
        <label for="idClasse">Classe:</label>
        <input type="text" class="form-control" name="idClasse"
            value="{{ $student_attendance->idClasse }}" />
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="dateTime" class="form-control" name="date"
            value="{{ $student_attendance->date }}" />
    </div>
    <div class="form-group">
        <label for="commentaire">Commentaire:</label>
        <input type="text" class="form-control" name="commentaire"
            value="{{ $student_attendance->commentaire }}" />
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection

