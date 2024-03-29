@extends('backend.layouts.template')


@section('title')
<h3><i class="fa fa-suitcase"></i>Emprunter un livre </h3>
<p>modifier un nouveau emprunt</p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <form method="POST" action="{{ route('admin.book_issu.update', $book_issue) }}">
        @csrf
        @method('POST')


        <div class="form-group col-md-12">
            <label for="student">{{ __('étudiant') }}</label>
            <input disabled type="text" class="form-control" id="prenom"
                value="{{ $book_issue->student->ine }}-{{ $book_issue->student->user->prenom }}-{{ $book_issue->student->user->nom }}">

        </div>
        <div class="form-group col-md-12">
            <label for="livre">{{ __('Livre') }}</label>
            <input disabled type="text" class="form-control" id="prenom"
                value="{{ $book_issue->book->name }}">

        </div>

        <div class="form-group col-md-12">
            <label for="issue_date">{{ __('Date emprunt') }}</label>
            <input type="date" format="YYYY-MM-DD" value="{{ $book_issue->issue_date }}"
                name="issue_date" class="form-control  @error('issue_date') is-invalid @enderror"
                id="issue_date" required>
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
                value="{{ $book_issue->due_date }}" required>
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
                value="{{ $book_issue->return_date }}" required>
            @error('return_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-12">
            <label for="comment">{{ __('Commentaire') }}</label>
            <input type="text" name="comment" class="form-control  @error('comment') is-invalid @enderror"
                id="comment" value="{{ $book_issue->comment }}" placeholder="commentaire du livre"
                required>
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

