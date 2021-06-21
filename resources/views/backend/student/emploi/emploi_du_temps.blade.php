@extends('backend.layouts.template')


@section('title')
    <h3><i class="fa fa-suitcase"></i>Emploie du temps :
        {{ $student->classe->niveau->code . '-' . $student->classe->filiere->code }}</h3>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                           <th scope="col">JOURS</th>
                            <th scope="col">MATIERE</th>
                            <th scope="col">Professeur</th>
                            <th scope="col">SALLE</th>
                            <th scope="col">DEBUT COURS</th>
                            <th scope="col">FIN COURS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student->classe->class_routines as $routine)
                        <tr>
                            <td scope="col">{{ $routine->day }}</td>
                            <td scope="col">{{ $routine->subject->name }}</td>
                            <td scope="col">{{ $routine->teacher->user->prenom .' '. $routine->teacher->user->nom }}
                            </td>
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
                            <th scope="col">Professeur</th>
                            <th scope="col">SALLE</th>
                            <th scope="col">DEBUT COURS</th>
                            <th scope="col">FIN COURS</th>
                        </tr>
                    </tfoot>
                </table>


            </div>

        </div>
    </div>
@endsection
