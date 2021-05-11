
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')

<main class="app-content">

    <div class="app-title">
        <div>
          <h1><i class="fa fa-file-o" aria-hidden="true"></i>Demande d'admission</h1>
            <p> Détail du demande d'admission pour la classe  <h4>{{ $demande_admission->classe->nameClass }}</h4> </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark" role="button" >retour </a>
           </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
              <div class="alert alert-success">
              {{ Session::get('success') }}
              </div>
            @endif
            @if(Session::has('error'))
              <div class="alert alert-danger">
              {{ Session::get('error') }}
              </div>
            @endif
          </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                   
                    <div class="form-row">
                       
                        <div class="form-group col-md-12">

                            

                            <div class="form-group row">
                                <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="prenom" value="{{ $demande_admission->prenom }}">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="nom" value="{{ $demande_admission->nom }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="adresse" class="col-sm-3 col-form-label">Adresse</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="adresse" value="{{ $demande_admission->adresse }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateNaissance" class="col-sm-3 col-form-label">Date de Naissance</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="dateNaissance" value="{{ $demande_admission->dateNaissance }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lieuNaissance" class="col-sm-3 col-form-label">Lieu de Naissance</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="lieuNaissance" value="{{ $demande_admission->lieuNaissance }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tel" class="col-sm-3 col-form-label">TEL :</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="tel" value="{{ $demande_admission->tel }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="genre" value="{{ $demande_admission->genre }}">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input  disabled type="text"  class="form-control" 
                                        id="email" value="{{ $demande_admission->email }}">
                                </div>
                            </div>

                            @if($demande_admission->bulletin != '')
                            <div class="form-group row">
                                <label for="bulletin" class="col-sm-3 col-form-label">Bulletin</label>

                                <cite title="Source Title">
                                    <a href="{{ asset($demande_admission->bulletin) }}" target="_blank" rel="noopener noreferrer">
                                      <object data="{{ asset($demande_admission->bulletin) }}" type="application/pdf" width="10%" height="10%">
                                        <embed src="{{ asset($demande_admission->bulletin) }}" type='application/pdf'>
                                      </object>{{ $demande_admission->bulletin }}
                                    </a>
                                </cite>

                               
                             </div>
                        @endif
                            
                        </div>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
</main>


@endsection


@section('scripts')

@endsection