@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-user"></i>Abscences</h1>
    <p>ajouter des abscences </p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
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
                                            {{ $classe->niveau->code . ' ' . $classe->filiere->code }} </option>

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
                                <input type="date" class="form-control" name="date" id="date" aria-describedby="helpId"
                                    placeholder="date absence">
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
                                <textarea name="attendance" class="form-control  @error('attendance') is-invalid @enderror"
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
@endsection
