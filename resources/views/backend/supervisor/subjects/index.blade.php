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
                                    <p class="mt-2">Liste des matieres</p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-success float-right btn-sm" href="{{ route('supervisor.subject.create') }}"
                                        role="button">Ajouter une matiere</a>

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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">Matiére</th>
                                        <th scope="col">Coefficient</th>
                                        <th scope="col">UE</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td scope="col">{{ $subject->name }}</td>
                                            <td scope="col">{{ $subject->coefficient }}</td>
                                            <td scope="col">{{ $subject->unitie->name }}</td>
                                            <td scope="col">{{ $subject->unitie->semester->code }}</td>
                                            <td scope="col">{{ $subject->unitie->semester->classe->code }}</td>
                                            <td scope="col">
                                                <a class="btn btn-warning" href="{{ route('supervisor.subject.edit', $subject) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('supervisor.subject.destroy', $subject) }}"
                                                    role="button">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Matiére</th>
                                        <th scope="col">Coefficient</th>
                                        <th scope="col">UE</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Action</th>
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
