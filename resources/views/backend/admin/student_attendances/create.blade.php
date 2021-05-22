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
                                    <p>ajouter des abscences </p>
                                </div>
                                <div class="col-md-6">

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
                            <div>
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <form action="{{ route('admin.student_attendance.store') }}" method="post">
                                                @csrf

                                                <div class="form-group col-md-12">
                                                    <label for="classe">{{ __('Classe') }}</label>

                                                    <select class="form-control" name="class_id" id="class_id" required>
                                                        <option></option>
                                                        @foreach ($classes as $classe)
                                                            <option value="{{ $classe->id }}">
                                                                {{ $classe->nameClass }} </option>

                                                        @endforeach
                                                    </select>


                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="student">{{ __('étudiant') }}</label>

                                                    <select class="form-control" name="student_id" id="student_id" required>
                                                        <option></option>
                                                        @foreach ($students as $student)
                                                            <option value="{{ $student->id }}">
                                                                {{ $student->user->prenom . ' ' . $student->user->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="date">date</label>
                                                    <input type="date" class="form-control" name="date" id="date"
                                                        aria-describedby="helpId" placeholder="date absence">
                                                    <small id="helpId" class="form-text text-muted">date de
                                                        l'absence</small>
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group col-md-12">
                                                    <label for="attendance">{{ __('Commentaire') }}</label>
                                                    <textarea name="attendance"
                                                        class="form-control  @error('attendance') is-invalid @enderror"
                                                        id="attendance" placeholder="commentaire..." required> </textarea>
                                                    @error('attendance')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
