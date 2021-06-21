@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Dossiers Scolaire</h1>
<p>Les bulletins de notes étudiants</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th>Année Académique</th>
                <th>Session</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dossiers as $dossier)
                <tr>
                    <td>{{ $dossier->academic_year->year }}</td>
                    <td>{{ $dossier->academic_year->session }}</td>
                    <td>{{ $dossier->student->user->prenom }}</td>
                    <td>{{ $dossier->student->user->nom }}</td>
                    <td>{{ $dossier->bulletin->classe->nameClass }}</td>
                    <td>
                        <a href="{{ route('supervisor.student.bulletin_etudiant', $dossier) }}"
                            class="btn btn-info">buelltin de notes</a>
                        <a href="{{ route('supervisor.student.delete_bulletin_etudiant', $dossier->id) }}"
                            class="btn btn-danger">supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Année Académique</th>
                <th>Session</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

