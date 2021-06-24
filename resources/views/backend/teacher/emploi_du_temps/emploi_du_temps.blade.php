@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Emploie du temps Professeur </h1>
    <h2 class="mt-2">Emploie du temps <u> {{ $teacher->user->prenom }} {{ $teacher->user->nom }} </u></h2>
@endsection
@section('option')

@endsection
@section('option-panel')



@endsection
@section('data')
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="sampleTable" width="100%">
                    <thead class="thead-dark">
                        <tr style="text-align: center;">
                            <th scope="col">JOURS</th>
                            <th scope="col">MATIERE</th>
                            <th scope="col">Classe</th>
                            <th scope="col">SALLE</th>
                            <th scope="col">DEBUT COURS</th>
                            <th scope="col">FIN COURS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Le corps du tableau ici -->
                        @foreach ($teacher->class_routines as $routine)
                            <tr>
                                <td scope="col">{{ $routine->day }}</td>
                                <td scope="col">{{ $routine->subject->name }}</td>
                                <td scope="col">
                                    {{ $routine->classe->niveau->code . ' ' . $routine->classe->filiere->code }}
                                </td>
                                <td scope="col">{{ $routine->classroom->description }} </td>
                                <td scope="col">{{ $routine->start_time }}</td>
                                <td scope="col">{{ $routine->end_time }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
