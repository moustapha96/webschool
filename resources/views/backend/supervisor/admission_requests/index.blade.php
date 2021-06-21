@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-file-o" aria-hidden="true"></i>Liste des Demandes Admissions </h1>
<p>Liste des admissions</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="tile">
    <div class="tile-body">
      <div class="table-responsive">

        <table class="table table-hover table-bordered" id="sampleTable" width="100%">
          <thead class="thead-dark">
            <tr>
              <th  scope="col" >INE</th>
              <th  scope="col" >Prenom</th>
              <th  scope="col" >Nom</th>
              <th  scope="col" >Adresse</th>
              <th  scope="col" >lieu Naissance</th>
              <th  scope="col" >E-mail</th>
              <th  scope="col" >Classe</th>
              <th  scope="col" >Dossier</th>
              <th  scope="col" >Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($admission_requests as $admission_request)
            <tr>
              <td>{{ $admission_request->ine }}</td>
              <td>{{ $admission_request->prenom }}</td>
              <td>{{ $admission_request->nom}}</td>
              <td>{{ $admission_request->adresse}}</td>
              <td>{{ $admission_request->lieuNaissance}}</td>
              <td>{{ $admission_request->email}}</td>
              <td>{{ $admission_request->classe->nameClass }}</td>
              <td>
                <a  href="{{ route('admission_requests.detail', $admission_request->id)}}" class="btn btn-primary">détail dossier</a>
              </td>
               <td>
                @if($admission_request->status == 0)
                    <a href="{{ route('admission_request.valider',$admission_request->id)}}" class="btn btn-info">VALIDER</a>

                @endif
                <a href="{{ route('admission_requests.destroy', $admission_request->id)}}"
                   class="btn btn-danger" >supprimer</button>
                </a>
              </td>
            </tr>
            @endforeach


          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection



