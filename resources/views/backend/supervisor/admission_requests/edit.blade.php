@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-file-o" aria-hidden="true"></i>Demande d'admission</h1>
<p class="mt-2">Modification d'une demande d'admisssion</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="tile-body">
    <form action="{{ route('admission_requests.update',$admission_request->id) }}" method="post">
        <div class="form-row">

            <div class="form-group col-md-12">
                <label for="ine">{{ __('INE') }}</label>
                <input  type="text"  name="ine" class="form-control @error('ine') is-invalid @enderror"
                id="ine" placeholder="ine" value="{{ $admission_request->ine }}" pattern="[0-9]/{13}" required >
                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="prenom">{{ __('Prenom') }}</label>
                <input  type="text" value="{{ $admission_request->prenom }}" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                id="prenom" placeholder="prenom"   required >
                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="nom">{{ __('Nom') }}</label>
                <input type="text" name="nom" value="{{ $admission_request->nom }}" class="form-control  @error('nom') is-invalid @enderror"
                id="nom" placeholder="nom"  required >
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="dateNaissance">{{ __('Date de Naissance') }}</label>
                <input type="date" value="{{ $admission_request->dateNaissance }}" name="dateNaissance" format="DD-MM-YYYY"
                class="form-control @error('dateNaissance') is-invalid @enderror"
                id="dateNaissance" required >
                @error('dateNaissance')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                <input type="text" value="{{ $admission_request->lieuNaissance }}" name="lieuNaissance"
                class="form-control @error('lieuNaissance') is-invalid @enderror"
                id="lieuNaissance" required >
                @error('lieuNaissance')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="adresse">{{ __('Adresse') }}</label>
                <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                id="adresse" name="adresse"value="{{ $admission_request->adresse }}"  required >
                @error('adresse')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="tel">{{ __('TEL') }} </label>
                <input type="text" class="form-control @error('tel') is-invalid @enderror"
                id="tel" name="tel" value="{{ $admission_request->tel }}" pattern="[0-9],{9}" required >

                @error('tel')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input type="email" value="{{ $admission_request->email }}"  class="form-control @error('email') is-invalid @enderror"
                id="email" placeholder="ex@example.com" name="email" >

                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="genre">{{ __('genre  ') }}</label>
                <select id="genre" name="genre" class="form-control" required >
                    <option ></option>
                    <option value="Masculin" {{ $admission_request->genre == 'Masculin' ? 'selected' :'' }} >Masculin</option>
                    <option value="Féminin"  {{ $admission_request->genre == 'Féminin' ? 'selected' :'' }}>Féminin</option>
                </select>
                @error('genre')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="classe">{{ __('Classe  ') }}</label>
                <select id="class_id" name="class_id" class="form-control" required >
                    <option></option>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}" {{ $admission_request->class_id == $classe->id ? 'selected' :'' }}>{{ $classe->nameClass }}/option>
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
                <input type="file"  value="{{ $admission_request->bulletin }}" class="form-control @error('bulletin') is-invalid @enderror"
                id="bulletin" placeholder="bulletin de note" name="bulletin" >

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
                    {{ __('Enregistrer les modifications') }}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection

