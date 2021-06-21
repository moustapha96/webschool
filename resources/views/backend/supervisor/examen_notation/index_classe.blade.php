@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-users"></i>Liste des classes</h1>
    <p> Liste des classes existant </p>
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
                    <th>classe</th>
                    <th>nom classe</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe)
                    <tr>
                        <td>{{ $classe->id }}</td>
                        <td>{{ $classe->nameClass }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('classe.list_etudiant', $classe) }}" class="btn btn-dark"
                                data-content="Show" data-placement="top" data-trigger="hover" data-toggle="tooltip"
                                data-placement="top" title="afficher liste etudiants">
                                afficher liste etudiant
                            </a>
                            <a href="{{ route('classe.imprimer_bulletin', $classe) }}" class="btn btn-info"
                                data-content="Show" data-placement="top" data-trigger="hover" data-toggle="tooltip"
                                data-placement="top" title="imprimer bulletin etudiants">
                                imprimer bulletin etudiants
                            </a>

                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>classe</th>
                    <th>nom classe</th>
                    <th>action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
