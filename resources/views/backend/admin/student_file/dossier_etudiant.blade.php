@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Dossiers Scolaire</h1>
    <p>Les dossiers des étudiants</p>

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
                    <th>Année Academique</th>
                    <th>Session</th>
                    <th> Etudiant</th>
                    <th>Classe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dossiers as $dossier)
                    <tr>
                        <td>{{ $dossier->academic_year->year }}</td>
                        <td>{{ $dossier->academic_year->session }}</td>
                        <td>
                            <a href="{{ route('admin.classes.show_student', $dossier->student) }}"
                                class="btn btn-outline-info">
                                {{ $dossier->student->user->prenom }}
                                {{ $dossier->student->user->nom }} </a>

                        </td>
                        <td>{{ $dossier->bulletin->classe->nameClass }}</td>
                        <td>
                            <a href="{{ route('student.bulletin_etudiant', $dossier) }}"
                                class="btn btn-outline-info">bulletin de notes</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Année Academique</th>
                    <th>Session</th>
                    <th> Etudiant</th>
                    <th>Classe</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
