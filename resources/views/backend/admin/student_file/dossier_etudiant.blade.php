


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
                                    <h1><i class="fa fa-suitcase"></i>Dossiers Scolaire</h1>
                                    <p>Les dossiers des étudiants</p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-primary float-right" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a>
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
                                        <th>Année Academique</th>
                                        <th>Session</th>
                                        <th> Etudiant</th>
                                        <th>Classe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dossiers as $dossier)
                                        <tr>
                                            <td>{{ $dossier->academic_year->year }}</td>
                                            <td>{{ $dossier->academic_year->session }}</td>
                                            <td>
                                                <a href="{{ route('admin.classes.show_student', $dossier->student) }}"
                                                    class="btn btn-outline-info">
                                                    {{ $dossier->student->user->prenom }}
                                                    {{ $dossier->student->user->nom }} </a>

                                            </td>
                                            <td>{{ $dossier->bulletin->classe->nameClass }}</td>
                                            <td>
                                                <a href="{{ route('student.bulletin_etudiant', $dossier) }}"
                                                    class="btn btn-outline-info">bulletin de notes</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Année Academique</th>
                                        <th>Session</th>
                                        <th> Etudiant</th>
                                        <th>Classe</th>
                                        <th>Action</th>
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
