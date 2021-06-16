@extends('backend.layouts.template')


@section('title')
<h1 class="card-title">Nouveau Livre</h1>

@endsection
@section('option')

@endsection
@section('option-panel')
   
@endsection
@section('data')
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
@endsection

