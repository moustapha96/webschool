{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-user"></i>Liste des Abscences </h1>
                <p>Modification d'une abscence</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="tile">
                    <div class="tile-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br />
                        @endif
                        <form method="Post" action="{{ route('student_attendances.update', $student_attendance->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="idStudent">Etudiant:</label>
                                <input type="text" class="form-control" name="idStudent"
                                    value="{{ $student_attendance->idStudent }}" />
                            </div>
                            <div class="form-group">
                                <label for="idClasse">Classe:</label>
                                <input type="text" class="form-control" name="idClasse"
                                    value="{{ $student_attendance->idClasse }}" />
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="dateTime" class="form-control" name="date"
                                    value="{{ $student_attendance->date }}" />
                            </div>
                            <div class="form-group">
                                <label for="commentaire">Commentaire:</label>
                                <input type="text" class="form-control" name="commentaire"
                                    value="{{ $student_attendance->commentaire }}" />
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')

@endsection --}}


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
                                    <h3><i class="fa fa-user"></i>Liste des Abscences </h3>
                                    <p>Modification d'une abscence</p>
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
                            <form method="Post"
                                action="{{ route('student_attendances.update', $student_attendance) }}">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="student_id">Etudiant:</label>
                                    <input type="text" class="form-control" name="student_id"
                                        value="{{ $student_attendance->student_id }}" />
                                </div>
                                <div class="form-group">
                                    <label for="class_id">Classe:</label>
                                    <input type="text" class="form-control" name="class_id"
                                        value="{{ $student_attendance->class_id }}" />
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="dateTime" class="form-control" name="date"
                                        value="{{ $student_attendance->date }}" />
                                </div>
                                <div class="form-group">
                                    <label for="attendance">Commentaire:</label>
                                    <input type="text" class="form-control" name="attendance"
                                        value="{{ $student_attendance->attendance }}" />
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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
