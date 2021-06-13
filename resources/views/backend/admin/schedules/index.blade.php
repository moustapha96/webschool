@extends('backend.layouts.main')


@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection


@section('main')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Emploi du temps</h4>
                                    <p>la liste</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.schedule.create') }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-plus-square " aria-hidden="true"></i> Nouveau</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">

                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">JOURS</th>
                                        <th scope="col">MATIERE</th>
                                        <th scope="col">PROFESSEUR</th>
                                        <th scope="col">SALLE</th>
                                        <th scope="col" >CLASSE</th>
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
                                            <td scope="col">{{ $class_routine->classroom->description }} </td>

                                            <td scope="col">{{ $class_routine->classe->niveau->name }}- {{ $class_routine->classe->filiere->name }}</td>
                                            <td scope="col">{{ $class_routine->start_time }} -- {{ $class_routine->end_time }} </td>

                                            <td scope="col">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.schedule.edit', $class_routine) }}"
                                                    role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.schedule.destroy', $class_routine) }}"
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
                                        <th scope="col">SALLE</th>
                                        <th scope="col">DEBUT COURS</th>
                                        <th scope="col">FIN COURS</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>

@endsection
