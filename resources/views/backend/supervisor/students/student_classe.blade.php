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
                                    <h1><i class="fa fa-suitcase"></i>Liste des étudiants</h1>
                                    <p>Liste des étudiants de la classe {{ $classe->niveau->code .' '.$classe->filiere->name }} </p>
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
                                        <th>INE</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date de naissance</th>
                                        <th>lieu de naissance</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classe->student as $student)
                                        <tr>

                                            <td>{{ $student->ine }}</td>
                                            <td>{{ $student->user->nom }}</td>
                                            <td>{{ $student->user->prenom }}</td>
                                            <td>{{ $student->user->dateNaissance }}</td>
                                            <td>{{ $student->user->lieuNaissance }}</td>
                                            <td>
                                                <a href="{{ route('admin.classes.show_student', $student) }}"
                                                    class="btn btn-outline-primary"> <i class="fa fa-eye" aria-hidden="true"></i>  </a>
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>INE</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date de naissance</th>
                                        <th>lieu de naissance</th>
                                        <th>Actions</th>
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
