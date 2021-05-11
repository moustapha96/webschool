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
                                    <h4 class="card-title">Nouveau Livre</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('books.index') }}" class="btn btn-info float-right btn-sm"
                                        role="button">Liste des Livres</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <form method="POST" action="{{ route('admin.book.store') }}">
                                @csrf
                                @method('POST')


                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="name">{{ __('name') }}</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="bame of book" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="author">{{ __('author') }}</label>
                                        <input type="text" name="author"
                                            class="form-control  @error('author') is-invalid @enderror" id="author"
                                            placeholder="author" required>
                                        @error('author')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ISBN">{{ __('ISBN') }}</label>
                                        <input type="text" name="ISBN"
                                            class="form-control  @error('ISBN') is-invalid @enderror" id="ISBN"
                                            placeholder="ISBN" required>
                                        @error('ISBN')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="quantity">{{ __('quantity') }}</label>
                                        <input type="number" name="quantity"
                                            class="form-control  @error('quantity') is-invalid @enderror" id="quantity"
                                            placeholder="quantity" required>
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="categori">{{ __('Catégorie') }}</label>

                                        <select class="form-control" name="category_id" id="category_id" required>
                                            <option></option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}"> {{ $categorie->name }} </option>

                                            @endforeach
                                        </select>


                                    </div>
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
