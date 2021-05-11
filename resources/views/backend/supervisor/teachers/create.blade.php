

@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Gestion des professeurs</h1>
        <p class="mt-2">Ajout d'un Professeur</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

    </ul>
</div>
    <div class="row">
    
     @if(Session::has('error'))
            <div class="alert alert-danger">
            {{ Session::get('error') }}
            </div>
     @endif

        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                  <section class="container" >
                        <div class="logo" style="text-align: center">
                           
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                <img src="{{ asset('images/settings/logo.png') }}" alt="App'School" height="90px">
                                <h5> Inscription </h5>   
                               </div>
                               <div class="form-group col-md-1">
                               </div>
                          </div>
                            
                           
                        </div>

                        <div>
                            <form  method="POST" action="{{ route('teachers.store') }}" >
                                @csrf

                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prenom">{{ __('Prenom') }}</label>
                                        <input  type="text"  name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                                        id="prenom" placeholder="prenom"   required >
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nom">{{ __('Nom') }}</label>
                                        <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror" 
                                        id="nom" placeholder="nom"  required >
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label for="dateNaissance">{{ __('Date de Naissance') }}</label>
                                        <input type="date" name="dateNaissance" format="DD-MM-YYYY"
                                        class="form-control @error('dateNaissance') is-invalid @enderror" 
                                        id="dateNaissance" required >
                                        @error('dateNaissance')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        
                                            <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                                            <input type="text" name="lieuNaissance" 
                                            class="form-control @error('lieuNaissance') is-invalid @enderror" 
                                            id="lieuNaissance" required >
                                            @error('lieuNaissance')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="adresse">{{ __('Adresse') }}</label>
                                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" 
                                        id="adresse" name="adresse"  required >
                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tel">{{ __('TEL') }} </label>
                                        <input type="text" class="form-control @error('tel') is-invalid @enderror"
                                        id="tel" name="tel"  required >
    
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="form-row">
                                   
                                    <div class="form-group col-md-6">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="ex@example.com" name="email" >
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="genre">{{ __('genre  ') }}</label>
                                        <select id="genre" name="genre" class="form-control" required >
                                          <option ></option>
                                            <option value="Masculin">Masculin</option>
                                            <option value="Féminin">Féminin</option>
                                        </select>
                                        @error('genre')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                               
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" 
                                        id="password" placeholder="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                        id="password-confirm" name="password_confirmation" required placeholder="Confirm Password">
    
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="row">

                                  <div class=" mx-auto align-content-center" >
                                       <button type="submit" class="pull-right btn btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>
                                              {{ __('enregistrer') }}
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














