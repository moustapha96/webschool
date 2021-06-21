@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-calendar" aria-hidden="true"></i>Emploi du temps</h1>
    <h2 class="mt-2">Emploi du temps de la <u> {{ $code }} </u></h2>
@endsection
@section('option')
    <a class="btn btn-success float-right btn-sm" href="{{ route('emploi.create') }}" role="button">Créer</a>
    <a class="btn btn-success float-right btn-sm" href="{{ route('emploi.imprimer', $code) }}" role="button">Imprimer</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr style="text-align: center;">
                    <th scope="col">JOURS</th>
                    <th scope="col">MATIERE</th>
                    <th scope="col">PROFESSEUR</th>
                    <th scope="col">SALLE</th>
                    <th scope="col">DEBUT COURS</th>
                    <th scope="col">FIN COURS</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classRoutines as $classRoutine)
                    <tr>
                        <td scope="col">{{ $classRoutine->day }}</td>
                        <td scope="col">{{ $classRoutine->subject->name }}</td>
                        <td scope="col">{{ $classRoutine->teacher->user->prenom }}
                            {{ $classRoutine->teacher->user->nom }} </td>
                        <td scope="col">{{ $classRoutine->classroom->description }} </td>
                        <td scope="col">{{ $classRoutine->start_time }}</td>
                        <td scope="col">{{ $classRoutine->end_time }}</td>

                        <td scope="col">
                            <a class="btn btn-primary" href="{{ route('emploi.edit', $classRoutine->id) }}"
                                role="button">Modifier</a>
                            <a class="btn btn-danger" href="{{ route('emploi.destroy', $classRoutine->id) }}"
                                role="button">Supprimer</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr style="text-align: center;">
                    <th scope="col">JOURS</th>
                    <th scope="col">MATIERE</th>
                    <th scope="col">PROFESSEUR</th>
                    <th scope="col">SALLE</th>
                    <th scope="col">DEBUT COURS</th>
                    <th scope="col">FIN COURS</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
