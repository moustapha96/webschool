@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Ajouter un utilisateur</h4>

@endsection
@section('option')
    <a class="btn btn-outline-primary float-right btn-sm" href="{{ route('admin.user.index') }}"><i class="fa fa-users"></i>
        liste des utilisateurs</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <form method="POST" action="{{ route('admin.user.store') }}">
            @csrf
            @method('POST')

            <div class="form-row">
                {{-- <div class="form-group col-md-6"> --}}
                <label for="role">{{ __('Role de l\'utilisateur  ') }}</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="">Sélectionner un rôle</option>
                    <option value="admin">Admin</option>
                    <option value="accountant">Comptable</option>
                    <option value="librian">Bibliothécaire</option>
                    <option value="supervisor">Responsable Pédagogique</option>
                    <option value="teacher">Professeur</option>
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                {{-- </div> --}}
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="prenom">{{ __('Prenom') }}</label>
                    <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="prenom"
                        placeholder="Prénom" required value="{{ old('prenom') }}">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="nom">{{ __('Nom') }}</label>
                    <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror" id="nom"
                        placeholder="Nom" required value="{{ old('nom') }}">
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
                        class="form-control @error('dateNaissance') is-invalid @enderror" id="dateNaissance" required
                        value="{{ old('dateNaissance') }}">
                    @error('dateNaissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">

                    <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                    <input type="text" name="lieuNaissance"
                        class="form-control @error('lieuNaissance') is-invalid @enderror" id="lieuNaissance" required
                        placeholder="Lieu de naissance" value="{{ old('lieuNaissance') }}">
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
                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse"
                        name="adresse" required placeholder="Adresse" value="{{ old('adresse') }}">
                    @error('adresse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="tel">{{ __('N° de téléphone') }} </label>
                    <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" required
                        placeholder="N° de téléphone" value="{{ old('tel') }}">

                    @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="email">{{ __('Adresse E-Mail') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="exemple@webschool.com" name="email" value="{{ old('email') }}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="genre">{{ __('Etat Civil') }}</label>
                    <select id="genre" name="genre" class="form-control" required>
                        <option value="">Etat Civil</option>
                        <option value="M.">M.</option>
                        <option value="Mlle">Mlle</option>
                        <option value="Mmme">Mme</option>
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
                    <label for="password">{{ __('Mot de passe') }}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Mot de passe" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password-confirm">{{ __('Confirmation du mot de passe') }}</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password-confirm" name="password_confirmation" required placeholder="Confirmer le mot de passe">

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">


                    <button type="submit" class="float-right btn btn-info"><i class="fa fa-save"></i>
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </div>



        </form>
    </div>
@endsection
