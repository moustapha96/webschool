@extends('backend.layouts.template')


@section('title')
<h3><i class="fa fa-suitcase"></i>Emprunter un livre </h3>
<p>Ajout d'un nouveau emprunt</p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <form method="POST" action="{{ route('admin.book_issu.store') }}">
        @csrf
        @method('POST')


        <div class="form-group col-md-12">
            <label for="student">{{ __('étudiant') }}</label>

            <select class="form-control" name="student_id" id="student" required>
                <option></option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">
                        {{ $student->ine }}-{{ $student->user->prenom }}-{{ $student->user->nom }}
                    </option>

                @endforeach
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="livre">{{ __('Livre') }}</label>

            <select class="form-control" name="book_id" id="livre" required>
                <option></option>
                @foreach ($livres as $livre)
                    <option value="{{ $livre->id }}"> {{ $livre->name }} </option>

                @endforeach
            </select>
        </div>

        <div class="form-group col-md-12">
            <label for="issue_date">{{ __('Date emprunt') }}</label>
            <input type="date" format="YYYY-MM-DD" value="{{ date('Y-m-d') }}" name="issue_date"
                class="form-control  @error('issue_date') is-invalid @enderror" id="issue_date" required>
            @error('issue_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <label for="due_date">{{ __('due emprunt') }}</label>
            <input type="date" format="YYYY-MM-DD" name="due_date"
                class="form-control  @error('due_date') is-invalid @enderror" id="due_date"
                value="{{ date('Y-m-d') }}" required>
            @error('due_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-12">
            <label for="return_date">{{ __('Date de retour') }}</label>
            <input type="date" name="return_date"
                class="form-control  @error('return_date') is-invalid @enderror" id="return_date"
                value="{{ date('Y-m-d') }}" required>
            @error('return_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-12">
            <label for="comment">{{ __('Commentaire') }}</label>
            <textarea type="text" name="comment"
                class="form-control  @error('comment') is-invalid @enderror" id="comment"
                placeholder="commentaire du livre" required></textarea>
            @error('comment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="row">

            <div class="mx-auto">

                <button type="submit" class="pull-right btn btn-primary"><i
                        class="fa fa-sign-in fa-lg fa-fw"></i>
                    {{ __('enregistrer ') }}
                </button>
            </div>
        </div>



    </form>

</div>
@endsection

