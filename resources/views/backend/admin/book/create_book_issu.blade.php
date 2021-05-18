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
                                    <p>Ajout d'un nouveau emprunt</p>
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
                            <form method="POST" action="{{ route('librian.book_issu.save') }}">
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
                                        class="form-control  @error('issue_date') is-invalid @enderror" id="issue_date"
                                        required>
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
                                    <input type="text" name="comment"
                                        class="form-control  @error('comment') is-invalid @enderror" id="comment"
                                        placeholder="commentaire du livre" required>
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
