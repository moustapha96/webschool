@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Emploi du temps</h4>
    <p>emploi du temps classe : <strong> {{ $classe->niveau->code . ' ' . $classe->filiere->code }} </strong></p>

@endsection
@section('option')

    @if ($class_routines != null)
        <a class="btn btn-outline-info float-right mr-2 "
            href="{{ route('admin.schedule.printScheduleClasse', $classe) }}" role="button"> <i class="fa fa-print"
                aria-hidden="true"></i> Imprimer</a>

    @endif

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
                    <th scope="col">PROFESSEUR</th>
                    <th scope="col">SALLE</th>
                    <th scope="col">DEBUT COURS</th>
                    <th scope="col">FIN COURS</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($class_routines as $class_routine)
                    <tr>
                        <td scope="col">{{ $class_routine->day }}</td>
                        <td scope="col">{{ $class_routine->subject->name }}</td>
                        <td scope="col">{{ $class_routine->teacher->user->prenom }}
                            {{ $class_routine->teacher->user->nom }} </td>
                        <td scope="col">{{ $class_routine->classroom->description }} </td>
                        <td scope="col">{{ $class_routine->start_time }}</td>
                        <td scope="col">{{ $class_routine->end_time }}</td>

                        <td scope="col">
                            <a class="btn btn-primary" href="{{ route('admin.schedule.edit', $class_routine) }}"
                                role="button">Modifier</a>
                            <a class="btn btn-danger" href="{{ route('admin.schedule.destroy', $class_routine) }}"
                                role="button">Supprimer</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
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
