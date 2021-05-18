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
                                    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Semestres</h1>
                                    <p class="mt-2">Liste des semestres</p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-info float-right " href="{{ route('admin.semester.create') }}"
                                        role="button"> <i class="fa fa-plus" aria-hidden="true"></i> Nouveau</a>
                                    <a class="btn btn-info float-right " href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a></li>

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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%">Code</th>
                                        <th scope="col" style="width: 10%">Nom Semestre</th>
                                        <th scope="col" style="width: 10%">Classe</th>
                                        <th scope="col" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $semester)
                                        <tr>
                                            <td scope="col" style="width: 10%">{{ $semester->code }}</td>
                                            <td scope="col" style="width: 10%">{{ $semester->name }}</td>
                                            <td scope="col" style="width: 10%">{{ $semester->classe->nameClass }}</td>
                                            <td scope="col" style="width: 10% ; text-align:center">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.semester.edit', $semester) }}"
                                                    role="button">Modifier</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" style="width: 10%">Code</th>
                                        <th scope="col" style="width: 10%">Nom Semestre</th>
                                        <th scope="col" style="width: 10%">Classe</th>
                                        <th scope="col" style="width: 10%">Action</th>
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
