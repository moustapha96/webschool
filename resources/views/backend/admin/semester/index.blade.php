@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Semestres</h1>
    <p class="mt-2">Liste des semestres</p>

@endsection
@section('option')

    <a class="btn btn-info float-right btn-sm " href="{{ route('admin.semester.create') }}" role="button"> <i class="fa fa-plus"
            aria-hidden="true"></i> Nouveau</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%">Code</th>
                    <th scope="col" style="width: 10%">Nom Semestre</th>
                    <th scope="col" style="width: 10%">Classe</th>
                    <th scope="col" style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semesters as $semester)
                    <tr>
                        <td scope="col" style="width: 10%">{{ $semester->code }}</td>
                        <td scope="col" style="width: 10%">{{ $semester->name }}</td>
                        <td scope="col" style="width: 10%">
                            {{ $semester->classe->niveau->code . ' ' . $semester->classe->filiere->code }}</td>
                        <td scope="col" style="width: 10% ; text-align:center">
                            <a class="btn btn-primary" href="{{ route('admin.semester.edit', $semester) }}"
                                role="button">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col" style="width: 10%">Code</th>
                    <th scope="col" style="width: 10%">Nom Semestre</th>
                    <th scope="col" style="width: 10%">Classe</th>
                    <th scope="col" style="width: 10%">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
