@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Gestion ds dossiers étudiants</h1>
    <p>Liste des dossiers</p>
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
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>classe actuelle</th>
                    <th>INE</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->user->prenom }}</td>
                        <td>{{ $student->user->nom }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->classe->niveau->code . ' ' . $student->classe->filiere->code }}</td>
                        <td>{{ $student->ine }}</td>
                        <td>
                            <a href="{{ route('supervisor.student.student_dossier', $student) }}"
                                class="btn btn-dark">dossier scolaire</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>classe actuelle</th>
                    <th>INE</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
