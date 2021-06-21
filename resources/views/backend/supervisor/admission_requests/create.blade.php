@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-file-o" aria-hidden="true"></i></i>Demande d'admission</h1>
<p class="mt-2">Enregistrer une demande d'admisssion</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('admission_requests.store') }}" method="post">
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="ine">{{ __('INE') }}</label>
                                <input type="text" name="ine"
                                    class="form-control @error('ine') is-invalid @enderror" id="ine"
                                    placeholder="ine" pattern="[0-9]{13}" required>
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="prenom">{{ __('Prenom') }}</label>
                                <input type="text" name="prenom"
                                    class="form-control @error('prenom') is-invalid @enderror"
                                    id="prenom" placeholder="prenom" required>
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nom">{{ __('Nom') }}</label>
                                <input type="text" name="nom"
                                    class="form-control  @error('nom') is-invalid @enderror"
                                    id="nom" placeholder="nom" required>
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="dateNaissance">{{ __('Date de Naissance') }}</label>
                                <input type="date" name="dateNaissance" format="DD-MM-YYYY"
                                    class="form-control @error('dateNaissance') is-invalid @enderror"
                                    id="dateNaissance" required>
                                @error('dateNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                                <input type="text" name="lieuNaissance"
                                    class="form-control @error('lieuNaissance') is-invalid @enderror"
                                    id="lieuNaissance" required>
                                @error('lieuNaissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="adresse">{{ __('Adresse') }}</label>
                                <input type="text"
                                    class="form-control @error('adresse') is-invalid @enderror"
                                    id="adresse" name="adresse" required>
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tel">{{ __('TEL') }} </label>
                                <input type="text"
                                    class="form-control @error('tel') is-invalid @enderror" id="tel"
                                    name="tel" pattern="[0-9]{9}" required>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="ex@example.com" name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="genre">{{ __('genre  ') }}</label>
                                <select id="genre" name="genre" class="form-control" required>
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                </select>
                                @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="classe">{{ __('Classe  ') }}</label>
                                <select id="class_id" name="class_id" class="form-control" required>
                                    <option></option>
                                    @foreach ($classes as $classe)
                                        <option value="{{ $classe->id }}">
                                            {{ $classe->nameClass }}/option>
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
                                <input type="file"
                                    class="form-control @error('bulletin') is-invalid @enderror"
                                    id="bulletin" placeholder="bulletin de note" name="bulletin">

                                @error('bulletin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mx-auto align-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



