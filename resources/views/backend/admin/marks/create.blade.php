@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Ajout d'une Note</h3>

@endsection
@section('option')
    <a href="{{ route('marks.index') }}" class="btn btn-info float-right btn-sm" role="button">Liste des notes</a>
    <a href="{{ route('marks.create') }}" class="btn btn-info float-right btn-sm" role="button"> <i class="fa fa-reply"
            aria-hidden="true"></i> Retour</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        @if ($matieres == null)
            <form action="{{ route('marks.subject') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="student_id">étudiant </label>
                    <select class="form-control" required name="student_id" id="student_id">
                        <option> </option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}"> {{ $student->user->prenom }}
                                {{ $student->user->nom }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">matieres</button>
                </div>
            </form>
        @endif


        @if ($matieres != null)
            <form action="{{ route('marks.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="student_id">étudiant </label>
                    <select class="form-control" required name="student_id" id="student_id">
                        <option> </option>
                        @foreach ($students as $stud)
                            <option value="{{ $stud->id }}" {{ $stud->id == $student->id ? 'selected' : '' }}>
                                {{ $stud->user->prenom }}
                                {{ $stud->user->nom }} </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="student_id">Matiere </label>
                    <select class="form-control" required name="subject_id" id="subject_id">
                        <option> </option>
                        @foreach ($matieres as $subject)
                            <option value="{{ $subject->id }}"> {{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="typeNote">Type Note</label>
                    <select class="form-control" required name="typeNote" id="typeNote">
                        <option></option>
                        <option value="examen">Examen</option>
                        <option value="devoir">Devoir</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="mark_value">Note</label>
                    <input type="number" min="0" max="20" step=".5" required name="mark_value" id="mark_value"
                        class="form-control @error('mark_value') is-invalid @enderror" placeholder="note">
                    @error('mark_value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">enregistrer</button>
                </div>

            </form>
        @endif

    </div>
@endsection
