
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Gestion des livres </h1>
            <p>Modification d'un livre</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark" role="button" >retour</a>
          </li>
        </ul>
      </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">




                    <section class="container" >
                        <div class="logo" style="text-align: center">
                           
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                <img src="{{ asset('images/settings/logo.png') }}" alt="App'School" height="90px">
                                <h5> Modifier un Livre </h5>   
                               </div>
                               <div class="form-group col-md-1">
                               </div>
                          </div>
                            
                           
                        </div>

                        <div>
                            <form  method="POST" action="{{ route('librian.book.update',$book) }}" >
                                @csrf
                                @method('POST')

                            
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-12">
                                        <label for="name">{{ __('name') }}</label>
                                        <input  type="text"  name="name" value="{{ $book->name }}" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="bame of book"   required >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="author">{{ __('author') }}</label>
                                        <input type="text" name="author" value="{{ $book->author }}" class="form-control  @error('author') is-invalid @enderror" 
                                        id="author" placeholder="author"  required >
                                            @error('author')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ISBN">{{ __('ISBN') }}</label>
                                        <input type="text" name="ISBN" value="{{ $book->ISBN }}" class="form-control  @error('ISBN') is-invalid @enderror" 
                                        id="ISBN" placeholder="ISBN"  required >
                                            @error('ISBN')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="quantity">{{ __('quantity') }}</label>
                                        <input type="number" name="quantity" value="{{ $book->quantity }}" class="form-control  @error('quantity') is-invalid @enderror" 
                                        id="quantity" placeholder="quantity"  required >
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label for="categori">{{ __('Catégorie') }}</label>
                                       
                                        <select  class="form-control" name="category_id" id="category_id" required>
                                           
                                          @foreach($categories as $categorie)

                                            <option  value="{{ $categorie->id }}" >  {{ $categorie->name }} </option>
                                            
                                            @endforeach
                                        </select>
                                        
                                        
                                    </div>
                                </div>
    
                               
    
                                <div class="row" >

                                    <div class="mx-auto">

                                        <button type="submit" class="pull-right btn btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>
                                               {{ __('enregistrer ') }}
                                        </button>
                                    </div>
                                </div>
                                

                            </form>

                           
                            
                        </div>

                        
                    </section>

                </div>
            </div>
        </div>
    </div>


</main>


@endsection


@section('scripts')

@endsection














