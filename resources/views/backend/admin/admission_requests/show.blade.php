
@extends('backend.layouts.template')


@section('title')
<h3><i class="fa fa-file-o" aria-hidden="true"></i>Demande d'admission</h3>
<p> Détail du demande d'admission pour la classe
<h4> {{ $admission_request->classe->niveau->name }} --
    {{ $admission_request->classe->filiere->name }} </h4>
</p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <div class="form-row">

        <div class="form-group col-md-12">



            <div class="form-group row">
                <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="prenom"
                        value="{{ $admission_request->prenom }}">
                </div>

            </div>
            <div class="form-group row">
                <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="nom"
                        value="{{ $admission_request->nom }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="adresse"
                        value="{{ $admission_request->adresse }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="dateNaissance" class="col-sm-3 col-form-label">Date de Naissance</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="dateNaissance"
                        value="{{ $admission_request->dateNaissance }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de Naissance</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="lieuNaissance"
                        value="{{ $admission_request->lieuNaissance }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="tel"
                        value="{{ $admission_request->tel }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="genre"
                        value="{{ $admission_request->genre }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input disabled type="text" class="form-control" id="email"
                        value="{{ $admission_request->email }}">
                </div>
            </div>

            @if ($admission_request->bulletin != '')
                <div class="form-group row">
                    <label for="bulletin" class="col-sm-3 col-form-label">Bulletin</label>

                    <cite title="Source Title">
                        <a href="{{ asset($admission_request->bulletin) }}" target="_blank"
                            rel="noopener noreferrer">
                            <object data="{{ asset($admission_request->bulletin) }}"
                                type="application/pdf" width="10%" height="10%">
                                <embed src="{{ asset($admission_request->bulletin) }}"
                                    type='application/pdf'>
                            </object>{{ $admission_request->bulletin }}
                        </a>
                    </cite>


                </div>
            @endif


        </div>
    </div>

</div>
@endsection

