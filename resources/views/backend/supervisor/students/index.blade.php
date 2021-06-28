@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Liste des étudiants </h1>
    <p>Liste des étudiants</p>
@endsection
@section('option')
    <a href="{{ route('supervisor.students.create') }}" class="btn btn-info float-right btn-sm" role="button"> <i
            class="fa fa-plus" aria-hidden="true"></i>
        nouveau</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table  table-striped table-bordered">
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
                            <a href="{{ route('supervisor.students.show', $student->id) }}" class="btn btn-primary"><i
                                    class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('supervisor.students.edit', $student->id) }}" class="btn btn-warning"><i
                                    class="fa fa-edit" aria-hidden="true"></i> </a>
                            <a href="{{ route('supervisor.students.delete', $student->id) }}" class="btn btn-danger"><i
                                    class="fa fa-trash" aria-hidden="true"></i> </a>
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
