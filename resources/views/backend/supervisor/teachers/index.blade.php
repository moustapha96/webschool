@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Gestion des professeurs</h1>
<p class="mt-2">Liste des professeurs</p>
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
                <th scope="col">Matricule</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Tel</th>
                <th scope="col">Adresse</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->matricule }}</td>
                    <td>{{ $teacher->user->prenom }}</td>
                    <td>{{ $teacher->user->nom }} </td>
                    <td>{{ $teacher->user->tel }} </td>
                    <td>{{ $teacher->user->adresse }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher->id) }}"
                            class="btn btn-info">show</a>
                        <a href="{{ route('teachers.edit', $teacher->id) }}"
                            class="btn btn-warning">edit</a>
                        <a href="{{ route('teachers.classe_routine', $teacher->id) }}"
                            class="btn btn-primary">Emploi du temps</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Matricule</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Tel</th>
                <th scope="col">Adresse</th>
                <th scope="col">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

