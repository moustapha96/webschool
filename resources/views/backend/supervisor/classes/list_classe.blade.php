@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Gestion des classes</h4>
@endsection
@section('option')
    <a href="{{ route('classes1.create1') }}" class="btn btn-info float-right btn-sm" role="button"> <i
            class="fa fa-reply" aria-hidden="true"></i> Ajouter une classe</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%">Nom Classe</th>
                    <th scope="col" style="width: 10%">Code</th>
                    <th scope="col" style="width: 10%">Salle</th>
                    <th scope="col" style="width: 10%">Semestre</th>

                    <th scope="col" style="width: 10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe)
                    <tr>
                        <td scope="col" style="width: 10%">{{ $classe->nameClass }}</td>
                        <td scope="col" style="width: 10%">{{ $classe->code }}</td>
                        <td scope="col" style="width: 10%">{{ $classe->classroom->name }}</td>
                        <td scope="col" style="width: 10%">

                            @if ($classe->semester->count() == 0)
                                pas de semestre
                            @else
                                <a class="btn btn-outline-info"
                                    href="{{ route('supervisor.liste_semestre', $classe->id) }}" role="button">
                                    {{ $classe->semester->count() }} semestre(s) </a>
                            @endif

                        </td>

                        <td scope="col" style="width: 10%; text-align:center">
                            <a class="btn btn-warning" href="{{ route('classes1.edit1', $classe->id) }}"
                                role="button">Modifier</a>
                            <a class="btn btn-danger" href="{{ route('classes1.destroy1', $classe->id) }}"
                                role="button">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col" style="width: 10%">Nom Classe</th>
                    <th scope="col" style="width: 10%">Code</th>
                    <th scope="col" style="width: 10%">Salle</th>
                    <th scope="col" style="width: 10%">Semestre</th>

                    <th scope="col" style="width: 10%">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
