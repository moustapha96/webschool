
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
                            <form method="post"
                                action="{{ route('admin.student_attendance.update', $student_attendance) }}">

                                @csrf

                                {{-- <div class="form-group">
                                    <label for="student_id">Etudiant:</label>
                                    <input type="text" class="form-control" name="student_id" disabled
                                        value="{{ $student_attendance->student->user->prenom . ' ' . $student_attendance->student->user->nom }}" />
                                </div>
                                <div class="form-group">
                                    <label for="class_id">Classe:</label>
                                    <input type="text" class="form-control" name="class_id" disabled
                                        value="{{ $student_attendance->classe->nameClass }}" />
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
                                </div> --}}
                                <div class="form-group col-md-12">
                                    <label for="classe">{{ __('Classe') }}</label>

                                    <select class="form-control" name="class_id" id="class_id" required>
                                        <option></option>
                                        @foreach ($classes as $classe)
                                            <option value="{{ $classe->id }}"  {{ $classe->id == $student_attendance->class_id ? 'selected' : '' }} >
                                                {{ $classe->nameClass }} </option>

                                        @endforeach
                                    </select>


                                </div>

                                <div class="form-group col-md-12">
                                    <label for="student">{{ __('étudiant') }}</label>

                                    <select class="form-control" name="student_id" id="student_id" required>
                                        <option></option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}" {{ $student->id == $student_attendance->student_id ? 'selected' : '' }}>
                                                {{ $student->user->prenom . ' ' . $student->user->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="date">date</label>
                                    <input type="date" class="form-control" name="date" id="date" aria-describedby="helpId"
                                        placeholder="date absence" value="{{ $student_attendance->date }}" >
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
                                        class="form-control  @error('attendance') is-invalid @enderror" id="attendance"
                                        placeholder="commentaire..." required> {{ $student_attendance->attendance }} </textarea>
                                    @error('attendance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
