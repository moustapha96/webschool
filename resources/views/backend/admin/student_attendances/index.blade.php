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
                                    <h1><i class="fa fa-user"></i>Abscences</h1>
                                    <p>Liste des abscences </p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-outline-primary float-right btn-sm"
                                        href="{{ route('admin.student_attendance.create') }}">
                                        <i class="fa fa-plus"></i> ajouter un absence</a></li>

                                    <a class="btn btn-info float-right btn-sm" href="{{ url()->previous() }}"><i
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
                                       
                                        <th>Student</th>
                                        <th>Classe</th>
                                        <th>Date</th>
                                        <th>attendance</th>
                                        <th>détail</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student_attendances as $student_attendance)
                                        <tr>
                                           
                                            <td>{{ $student_attendance->student->ine }}</td>
                                            <td>{{ $student_attendance->classe->nameClass }}</td>
                                            <td>{{ $student_attendance->date }}</td>
                                            <td>{{ $student_attendance->attendance }}</td>
                                            <td><a href="{{ route('admin.student_attendance.edit', $student_attendance) }}"
                                                    class="btn btn-outline-primary"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                            <td>
                                                <form
                                                    action="{{ route('admin.student_attendance.destroy', $student_attendance) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger" type="submit"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                        <th>Student</th>
                                        <th>Classe</th>
                                        <th>Date</th>
                                        <th>attendance</th>
                                        <th>détail</th>
                                        <th colspan="2">Actions</th>
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
