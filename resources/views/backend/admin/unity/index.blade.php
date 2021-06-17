@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Gestion des UE</h1>
    <p class="mt-2">Liste des unités d'enseignements</p>

@endsection
@section('option')
    <a class="btn btn-success float-right btn-sm" href="{{ route('admin.unity.create') }}" role="button">Ajouter un UE</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom UE</th>
                    <th scope="col">Crédit</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Nom Classe</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unities as $unity)
                    <tr>
                        <td scope="col">{{ $unity->code }}</td>
                        <td scope="col">{{ $unity->name }}</td>
                        <td scope="col">{{ $unity->credit }}</td>
                        <td scope="col">{{ $unity->semester->code }}</td>
                        <td scope="col">
                            {{ $unity->semester->classe->niveau->code . ' ' . $unity->semester->classe->filiere->code }}
                        </td>
                        <td scope="col">
                            <a class="btn btn-warning" href="{{ route('admin.unity.edit', $unity->id) }}"
                                role="button">Modifier</a>
                            <a class="btn btn-danger" href="{{ route('admin.unity.destroy', $unity->id) }}"
                                role="button">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom UE</th>
                    <th scope="col">Crédit</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Nom Classe</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
