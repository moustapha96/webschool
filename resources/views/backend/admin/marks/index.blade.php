
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
                                    <h4 class="card-title">Gestion des Notes</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('marks.create') }}" class="btn btn-info float-right btn-sm"
                                        role="button">Ajouter une note</a>
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
                                        <th>étudiant</th>
                                        <th>email</th>
                                        <th>classe</th>
                                        <th>matiere</th>
                                        <th>note</th>
                                        <th>type</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($marks as $mark)
                                        <tr>
                                            <td> {{ $mark->student->user->prenom .' '. $mark->student->user->nom }}</td>
                                            <td>{{ $mark->student->user->email }}</td>
                                            <td>{{ $mark->student->classe->nameClass }}</td>
                                            <td>{{ $mark->subject->name }}</td>
                                            <td>{{ $mark->mark_value }}</td>
                                            <td>{{ $mark->typeNote }}</td>

                                            <td class="hover">
                                                <a href="{{ route('marks.edit', $mark) }}" class="btn btn-link  hover"> <i
                                                        class="fa fa-pencil" aria-hidden="true"></i> </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>étudiant</th>
                                        <th>email</th>
                                        <th>classe</th>
                                        <th>matiere</th>
                                        <th>note</th>
                                        <th>type</th>
                                        <th>action</th>
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
