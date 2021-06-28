@extends('backend.layouts.template')


@section('title')
    <h1 class="card-title">Emploi du temps</h1>
    <br>  <p>la liste</p>

@endsection
@section('option')
    <a href="{{ route('admin.schedule.create') }}" class="btn btn-info float-right btn-sm" role="button"> <i
            class="fa fa-plus-square " aria-hidden="true"></i> Nouveau</a>

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
                   
                    <th scope="col">CLASSE</th>
                    <th scope="col">HORAIRE</th>
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
                       

                        <td scope="col">{{ $class_routine->classe->niveau->name }}-
                            {{ $class_routine->classe->filiere->name }}</td>
                        <td scope="col">{{ $class_routine->start_time }} -- {{ $class_routine->end_time }} </td>

                        <td scope="col">
                            <a class="btn btn-outline-primary" href="{{ route('admin.schedule.edit', $class_routine) }}"
                                role="button"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a class="btn btn-outline-danger" href="{{ route('admin.schedule.destroy', $class_routine) }}"
                                role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">JOURS</th>
                    <th scope="col">MATIERE</th>
                    <th scope="col">PROFESSEUR</th>
                   
                    <th scope="col">DEBUT COURS</th>
                    <th scope="col">FIN COURS</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
