@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Emploi du temps Professeur </h1>
<h2 class="mt-2">Emploi du temps <u> {{ $teacher->user->prenom }}
        {{ $teacher->user->nom }} </u></h2>
@endsection
@section('option')
<a class="btn btn-info float-right btn-sm"
href="{{ route('teachers.print_class_routine', $teacher) }}"
role="button">Imprimer</a>
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
                <th scope="col">DEBUT COURS</th>
                <th scope="col">FIN COURS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacher->class_routines as $routine)
                <tr>
                    <td scope="col">{{ $routine->day }}</td>
                    <td scope="col">{{ $routine->subject->name }}</td>
                    <td scope="col">{{ $routine->classe->niveau->code.' '.$routine->clase->filiere->code }}</td>
                    <td scope="col">{{ $routine->classroom->description }} </td>
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
                <th scope="col">DEBUT COURS</th>
                <th scope="col">FIN COURS</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
