@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-pencil" aria-hidden="true"></i> Réclamations</h1>
    <p>Liste des réclamations</p>
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
                    <th scope="col">INE</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Date</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reclaetudiants as $reclaetudiant)
                    <tr>
                        <td>{{ $reclaetudiant->student->ine }}</td>
                        <td>{{ $reclaetudiant->student->user->prenom }}</td>
                        <td>{{ $reclaetudiant->student->user->nom }}</td>
                        <td>{{ $reclaetudiant->student->classe->nameClass }}</td>
                        <td>{{ $reclaetudiant->reclamation->dateRecla }}</td>
                        <td>{{ $reclaetudiant->reclamation->commentaire }}</td>
                        <td>

                            <a href="{{ route('reclaetudiants.destroy', $reclaetudiant->id) }}" class="btn btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">INE</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Date</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
