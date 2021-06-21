@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-users" aria-hidden="true"></i></i>Gestion des Classes</h1>
    <h4 class="mt-2">Semestre de la {{ $classe->nameClass }}</h4>
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
                    <th scope="col">Code</th>
                    <th scope="col">Nom </th>
                    <th scope="col">Classe </th>
                    <th scope="col">UE et matiere</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classe->semester as $semestre)
                    <tr>
                        <td scope="col">{{ $semestre->code }}</td>
                        <td scope="col">{{ $semestre->name }}</td>
                        <td scope="col">{{ $semestre->classe->nameClass }}</td>
                        <td scope="col">
                            @if ($classe->semester->count() == 0)
                                pas d'unité d'enseignement
                            @else
                                <a class="btn btn-outline-info"
                                    href="{{ route('supervisor.liste_ue_matiere', $semestre->id) }}" role="button">liste
                                    des UE</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom </th>
                    <th scope="col">Classe </th>
                    <th scope="col">UE et matiere</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
