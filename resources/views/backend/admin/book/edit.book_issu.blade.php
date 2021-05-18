@extends('backend.layouts.main')


@section('styles')

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
                                    <h1><i class="fa fa-suitcase"></i>Emprunter un livre </h1>
                                    <p>modifier un nouveau emprunt</p>
                                </div>
                                <div class="col-md-6">

                                    <a href="{{ url()->previous() }}" class="btn btn-info float-right btn-sm"
                                        role="button">retour</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
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
                                    <input type="date" format="YYYY-MM-DD" value="{{ $book_issu->issue_date }}"
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
                                    <input type="text" name="comment"
                                        class="form-control  @error('comment') is-invalid @enderror" id="comment"
                                        value="{{ $book_issu->comment }}" placeholder="commentaire du livre" required>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')



@endsection
