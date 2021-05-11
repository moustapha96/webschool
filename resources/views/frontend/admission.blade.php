
@extends('frontend.main')


@section ('seo')

@endsection


@section('main')

    <section class="container" >
        <div class="logo text-center ">
            <h1>
                <img src="{{ asset('images/settings/ws_bj.jpg') }}" 
                alt="App'School" height="150px" width="500px">
            </h1>
            <div class="card-header">
                <h3> {{ __('Demande d\'Admission') }} </h3>
                <hr>
            </div>
        </div>
            <div class="container-fluid">
                <div class=" align-items-xl-center ">
                    <div id ="message"class="col-md-12 col-sm-12">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <div id="msgSubmit" class="h3 text-center hidden"> Demande  envoyé avec succès !</div>
                                
                         </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                <div id="msgSubmit" class="h3 text-center hidden"> Demande non envoyé , Veuillez réessayer svp</div>
                          
                            </div>
                        @endif
                    </div>
                    
                    <div class="tile">
                        <div class="tile-body">
                            <form action="{{ route('admission_envoie') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
        
                                    <div class="form-group col-md-6">
                                        <label for="ine">{{ __('INE') }}</label>
                                        <input  type="text"  name="ine" class="form-control @error('ine') is-invalid @enderror"
                                           id="ine" placeholder="ine"  pattern="[0-9]{13}" required >
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                        id="tel" name="tel" pattern="[0-9]{9}" required >
        
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                            <option value="Masculin">Masculin</option>
                                            <option value="Féminin">Féminin</option>
                                        </select>
                                        @error('genre')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="classe">{{ __('Classe  ') }}</label>
                                        <select id="class_id" name="class_id" class="form-control" required >
                                            <option></option>
                                            @foreach($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->nameClass }}/option>
                                            @endforeach
                                        </select>
                                        @error('genre')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="bulletin">{{ __('Bulletin') }}</label>
                                        <input type="file" class="form-control @error('bulletin') is-invalid @enderror"
                                        id="bulletin" placeholder="bulletin de note" name="bulletin" >
        
                                        @error('bulletin')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row col-sm-6  col-sm-offset-3 ">
                                    <div class="mx-auto align-items-xl-center">
                                        <button type="submit" class="btn btn-block btn-container btn-primary">
                                            {{ __('Envoyer la demande') }}
                                        </button>
                                    </div>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      
    </section>

   
@endsection