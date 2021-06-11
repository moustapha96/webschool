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
                                    <h3><i class="fa fa-suitcase"></i>Emploi du temps </h3>
                                    <p class="mt-2">Professeur >> <u> {{ $teacher->user->prenom }}
                                            {{ $teacher->user->nom }} </u></p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-primary float-right" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i>
                                        Retour</a>
                                </div>
                            </div>

                            <hr>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">JOURS</th>
                                        <th scope="col">MATIERE</th>
                                        <th scope="col">CLASSE</th>
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
                                            <td scope="col">{{ $routine->classe->niveau->code.' '.$routine->classe->filiere->code }}</td>
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
                                        <th scope="col">CLASSE</th>
                                        <th scope="col">SALLE</th>
                                        <th scope="col">DEBUT COURS</th>
                                        <th scope="col">FIN COURS</th>
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
