@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Liste des étudiants </h1>
<p>Liste des étudiants</p>
@endsection
@section('option')
<a href="{{ route('supervisor.students.create') }}"
                                        class="btn btn-info float-right btn-sm" role="button">Ajouter un nouveau</a>
@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>

                <th>INE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>lieu de naissance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>

                    <td>{{ $student->ine }}</td>
                    <td>{{ $student->user->nom }}</td>
                    <td>{{ $student->user->prenom }}</td>
                    <td>{{ $student->user->dateNaissance }}</td>
                    <td>{{ $student->user->lieuNaissance }}</td>
                    <td>
                        <a href="{{ route('supervisor.students.show', $student->id) }}"
                            class="btn btn-primary">détail</a>
                        <a href="{{ route('supervisor.students.edit', $student->id) }}"
                            class="btn btn-warning">modifier</a>
                        <a href="{{ route('supervisor.students.delete', $student->id) }}"
                            class="btn btn-danger">supprimer</a>
                    </td>

                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>INE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>lieu de naissance</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection


