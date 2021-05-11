

@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')

<main class="app-content">

    @if(session()->has('messageSuccess'))
    <div class="alert alert-success">
        {{ session()->get('messageSuccess') }}
    </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <section class="container" >
                        <div class="logo" style="text-align: center">

                            <form method="post" class="needs-validation" novalidate action="{{ route('user.update_profil') }}" 
                                        enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
            
                                  
                                  <div class="col-md-4">
                                    </div>
            
                                    <div class="col-md-4">
                                        <label for="logo" class="btn text-center" >
                                          <img id="logosite" src="{{ asset(Auth::user()->avatar) }}"  
                                                style="  height: 200px;width: 200px ; border-radius: 90%" >
                                        </label>
                                        <input type="file" id="logo" name="logo" 
                                            style="visibility: hidden;border-radius: 50% " onchange="load_image(this, 'logosite');" 
                                            accept=".jpg,.jpeg,.png" >
                
                
                                      </div>
                                  <div class="col-md-4">
                                     </div>
            
            
                                 
            
                                </div>
            
            
                                <hr>
                                <p class="text-center">
                                  <input type="submit" class="btn btn-primary " value="{{ __('Mettre à jour') }}">
                                </p> 
                              </form>

                           
                        </div>

                        <hr>

                        <div>

                            <form  action="{{ route('user.update_profil') }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prenom">{{ __('Prenom') }}</label>
                                        <input  type="text"  name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                                        id="prenom" placeholder="prenom"  value="{{ $user->prenom }}" required >
                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nom">{{ __('Nom') }}</label>
                                        <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror" 
                                        id="nom" placeholder="nom" value="{{ $user->nom }}" required >
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
                                        id="dateNaissance" required  value="{{ $user->dateNaissance }}" >
                                        @error('dateNaissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">

                                        <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                                        <input type="text" name="lieuNaissance" value="{{ $user->lieuNaissance }}"
                                        class="form-control @error('lieuNaissance') is-invalid @enderror" 
                                        id="lieuNaissance" required value="{{ old('lieuNaissance') }}">
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
                                        id="adresse" name="adresse" value="{{ $user->adresse }}" required >
                                        @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tel">{{ __('N° de téléphone') }} </label>
                                        <input type="text" class="form-control @error('tel') is-invalid @enderror"
                                        id="tel" name="tel" value="{{ $user->tel }}" required >

                                        @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="email">{{ __('E-Mail') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="ex@example.com" name="email" value="{{ $user->email }}">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="genre">{{ __('genre') }}</label>
                                        @if(  $user->genre == 'Masculin' )
                                        <select id="genre" name="genre"  class="form-control" required >
                                            <option value="Masculin" selected>Masculin</option>
                                            <option value="Féminin">Féminin</option>
                                        </select>
                                        @else
                                        <select id="genre" name="genre"  class="form-control" required >
                                            <option value="Masculin">Masculin</option>
                                            <option value="Féminin"  selected>Féminin</option>
                                        </select>
                                        @endif
                                        @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        @if($user->role === 'accountant' )
                                        <label for="matricule">{{ __('Matricule') }}</label>
                                        <input  disabled type="text" name="matricule" class="form-control @error('matricule') is-invalid @enderror" 
                                        id="matricule" placeholder="D232212" required value="{{ $user->accountant->matricule }}">

                                        @elseif($user->role === "librian" )
                                        <label for="matricule">{{ __('Matricule') }}</label>
                                        <input disabled type="text" name="matricule" class="form-control @error('matricule') is-invalid @enderror" 
                                        id="matricule" placeholder="D232212" required value="{{ $user->librian->matricule }}">

                                        @elseif($user->role === "supervisor" )
                                        <label for="matricule">{{ __('Matricule') }}</label>
                                        <input disabled type="text" name="matricule" class="form-control @error('matricule') is-invalid @enderror" 
                                        id="matricule" placeholder="D232212" required value="{{ $user->supervisor->matricule }}">

                                        @endif

                                        @error('matricule')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">

                                    </div>
                                </div>


                                <div class="form-row">

                                    <div class="form-group col-12 m-*-auto" >
                                        <button type="submit" class="pull-right btn btn-primary">
                                            <i class="fa fa-sign-in fa-lg fa-fw"></i>
                                            {{ __('mettre à jour ') }}
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
<script src="{{ asset('js/jscolor/jscolor.js') }}"></script>

@endsection
