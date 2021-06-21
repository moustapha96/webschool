@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Gestion étudiants </h1>
    <p>Ajout d'un étudiant</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="tile-body">

        <section class="container">




            <div class="mt-2">

                <form action="{{ route('supervisor.students.store') }}" method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="prenom">{{ __('Prenom') }}</label>
                            <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
                                id="prenom" placeholder="prenom" required>
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nom">{{ __('Nom') }}</label>
                            <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror" id="nom"
                                placeholder="nom" required>
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
                                class="form-control @error('dateNaissance') is-invalid @enderror" id="dateNaissance"
                                required>
                            @error('dateNaissance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                            <input type="text" name="lieuNaissance"
                                class="form-control @error('lieuNaissance') is-invalid @enderror" id="lieuNaissance"
                                required>
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
                                name="adresse" required>
                            @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tel">{{ __('TEL') }} </label>
                            <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel"
                                required>

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
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="genre">{{ __('genre') }} </label>
                            <select id="genre" name="genre" class="form-control" required>
                                <option></option>
                                <option value="Masculin">Masculin</option>
                                <option value="Féminin">Féminin</option>
                            </select>
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ine">{{ __('INE') }}</label>
                            <input type="text" class="form-control @error('ine') is-invalid @enderror" id="ine" name="ine">

                            @error('ine')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="class_id">{{ __('Classe') }} </label>
                            <select id="class_id" name="class_id" class="form-control" required>
                                <option></option>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->nameClass }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>



                    <div class="row">
                        <div class="mx-auto align-content-center">
                            <button type="submit" class="pull-right btn btn-outline-primary" data-toggle="tooltip"
                                data-placement="bottom" title="mettre à jour">
                                <i class="fa fa-sign-in fa-lg fa-fw"></i>
                                {{ __('enregistrer les modification ') }}
                            </button>
                        </div>
                    </div>




                </form>

            </div>


        </section>



    </div>
@endsection
