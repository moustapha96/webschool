@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Emprunter un livre </h1>
    <p>Modifier un emprunt </p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="tile">
        <div class="tile-body">

            <section class="container">
                <div class="logo" style="text-align: center">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <img src="{{ asset('images/settings/logo.png') }}" alt="App'School" height="90px">
                            <h5> Modification d'un Emprunt </h5>
                        </div>
                        <div class="form-group col-md-1">
                        </div>
                    </div>


                </div>

                <div>
                    <form method="POST" action="{{ route('librian.book_issu.update', $book_issu) }}">
                        @csrf
                        @method('POST')


                        <div class="form-group col-md-12">
                            <label for="student">{{ __('étudiant') }}</label>
                            <input disabled type="text" class="form-control" id="prenom"
                                value="{{ $book_issu->student->ine }}-{{ $book_issu->student->user->prenom }}-{{ $book_issu->student->user->nom }}">

                        </div>
                        <div class="form-group col-md-12">
                            <label for="livre">{{ __('Livre') }}</label>
                            <input disabled type="text" class="form-control" id="prenom"
                                value="{{ $book_issu->book->name }}">

                        </div>

                        <div class="form-group col-md-12">
                            <label for="issue_date">{{ __('Date emprunt') }}</label>
                            <input type="date" format="YYYY-MM-DD" value="{{ $book_issu->issue_date }}" name="issue_date"
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
                                value="{{ $book_issu->due_date }}" required>
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
                                value="{{ $book_issu->return_date }}" required>
                            @error('return_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="comment">{{ __('Commentaire') }}</label>
                            <input type="text" name="comment" class="form-control  @error('comment') is-invalid @enderror"
                                id="comment" value="{{ $book_issu->comment }}" placeholder="commentaire du livre"
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


            </section>

        </div>
    </div>
@endsection
