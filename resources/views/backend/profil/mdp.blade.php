

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

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Modifier le mot de passe</h3>
                                <hr width="40%" align="left">


                                <form  action="{{ route('mdp.edit') }}" method="POST">
                                    @csrf
                                    @method('PATCH')


                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="current_password">Mot de passe actuel</label>
                                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" 
                                            id="current_password" placeholder="Mot de passe actuel" required>
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="password">{{ __('Nouveau mot de passe') }}</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                            id="password" placeholder="Mot de passe" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="password-confirm">{{ __('Confirmation du nouveau Mot de passe') }}</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                            id="password-confirm" name="password_confirmation" required placeholder="Confirm Password">

                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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

                            <div class="col-md-5 offset-1">
                                <h4>Consignes pour un mot de passe sécurisé</h4>
                                <p>Un mot de passe sécurisé doit avoir :</p>
                                <ul>
                                    <li>8 caractères au moins</li>
                                    <li>1 chiffre au moins</li>
                                    <li>1 majuscule</li>
                                    <li>Des caractères spéciaux</li>
                                </ul>

                                <p>Un mot de passe sécurisé <strong>NE DOIT PAS</strong> :</p>
                                <ul>
                                    <li>Ressembler au nom ou à l'adresse Email</li>
                                    <li>Etre composé de suite logique de chiffres ou de lettres</li>
                                    <li>Etre court ou facile à deviner</li>
                                </ul>

                            </div>
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
