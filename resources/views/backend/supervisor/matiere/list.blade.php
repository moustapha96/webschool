@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Matieres</h1>
    <p class="mt-2">Liste des matieres</p>
@endsection
@section('option')
    <a class="btn btn-success float-right btn-sm" href="{{ route('matiere.createM') }}" role="button">Ajouter une
        matiere</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th scope="col">Matiére</th>
                    <th scope="col">Coefficient</th>
                    <th scope="col">UE</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td scope="col">{{ $subject->name }}</td>
                        <td scope="col">{{ $subject->coefficient }}</td>
                        <td scope="col">{{ $subject->unitie->name }}</td>
                        <td scope="col">{{ $subject->unitie->semester->code }}</td>
                        <td scope="col">{{ $subject->unitie->semester->classe->code }}</td>
                        <td scope="col">
                            <a class="btn btn-warning" href="{{ route('matiere.editM', $subject->id) }}"
                                role="button">Modifier</a>
                            <a class="btn btn-danger" href="{{ route('matiere.destroyM', $subject->id) }}"
                                role="button">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Matiére</th>
                    <th scope="col">Coefficient</th>
                    <th scope="col">UE</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
