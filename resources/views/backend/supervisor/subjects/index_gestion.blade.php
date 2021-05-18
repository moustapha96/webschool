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
                                    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Matieres</h1>
                                    <h4 class="mt-2">Enregistrement des matieres , unités et semestres </h4>
                                </div>
                                <div class="col-md-6">


                                    <a href="{{ url()->previous() }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>

                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <div class="row">

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
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead>
                                    <th>Gestion</th>
                                    <th>Option</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Semestres </td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('supervisor.semester.create') }}"
                                                role="button">ajouter</a>
                                            <a class="btn btn-dark" href="{{ route('supervisor.semester.index') }}"
                                                role="button">lister</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Unités d'enseignement</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('unity.createU') }}"
                                                role="button">ajouter</a>
                                            <a class="btn btn-dark" href="{{ route('unity.indexU') }}"
                                                role="button">lister</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Matières</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('supervisor.subject.create') }}"
                                                role="button">ajouter</a>
                                            <a class="btn btn-dark" href="{{ route('supervisor.subject.index') }}"
                                                role="button">lister</a>
                                        </td>
                                    </tr>
                                </tbody>
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
