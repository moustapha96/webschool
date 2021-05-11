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
                                    <h4 class="card-title">Liste des Etudiants</h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;">
                                        <th>INE</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date de naissance</th>
                                        <th>lieu de naissance</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->ine }}</td>
                                            <td>{{ $student->user->nom }}</td>
                                            <td>{{ $student->user->prenom }}</td>
                                            <td>{{ $student->user->dateNaissance }}</td>
                                            <td>{{ $student->user->lieuNaissance }}</td>
                                            <td>
                                                <a href="{{ route('admin.classes.show_student', $student) }}"
                                                    class="btn btn-primary">détail</a>
                                            </td>
                                        </tr>

                                    @endforeach

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
