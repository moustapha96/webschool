@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Emplois du temps Professeurs </h1>
<h2 class="mt-2">Liste des Emplois du temps des Professeurs</h2>
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
                <th scope="col">JOURS</th>
                <th scope="col">MATIERE</th>
                <th scope="col">Classe</th>
                <th scope="col">SALLE</th>
                <th scope="col">Professeur</th>
                <th scope="col">DEBUT COURS</th>
                <th scope="col">FIN COURS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($class_routines as $routine)
                <tr>
                    <td scope="col">{{ $routine->day }}</td>
                    <td scope="col">{{ $routine->subject->name }}</td>
                    <td scope="col">{{ $routine->classe->niveau->code.' '.$routine->classe->filiere->code }}</td>
                    <td scope="col">{{ $routine->classroom->description }} </td>
                    <td scope="col">
                        <a href="{{ route('teachers.show', $routine->teacher->id) }}"
                            class="btn btn-info">
                            {{ $routine->teacher->user->prenom }}
                            {{ $routine->teacher->user->nom }}
                        </a>
                    </td>
                    <td scope="col">{{ $routine->start_time }}</td>
                    <td scope="col">{{ $routine->end_time }}</td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">JOURS</th>
                <th scope="col">MATIERE</th>
                <th scope="col">Classe</th>
                <th scope="col">SALLE</th>
                <th scope="col">Professeur</th>
                <th scope="col">DEBUT COURS</th>
                <th scope="col">FIN COURS</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection


