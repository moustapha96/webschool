@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Emploi du temps  </h1>
        <p class="mt-2">Professeur >> <u> {{ $teacher->user->prenom }} {{ $teacher->user->nom }} </u></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"> 
        <a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>
    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
          @if(Session::has('error'))
          <div class="alert alert-danger">
          {{ Session::get('error') }}
          </div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success">
          {{ Session::get('success') }}
          </div>
          @endif
      </div>
    <div class="col-md-12">
     
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="sampleTable" width="100%">
              <thead class="thead-dark">
                <tr style="text-align: center;">
                  <th  scope="col" >JOURS</th>
                  <th  scope="col" >MATIERE</th>
                  <th  scope="col" >Classe</th>
				          <th  scope="col" >SALLE</th>
                  <th  scope="col" >DEBUT COURS</th>
                  <th  scope="col" >FIN COURS</th>
                </tr>
              </thead>
                  <tbody>
                    <!-- Le corps du tableau ici -->
                      @foreach($teacher->class_routines as $routine)
                      <tr>
                        <td  scope="col" >{{ $routine->day }}</td>
                        <td  scope="col" >{{ $routine->subject->name }}</td>
                        <td  scope="col" >{{ $routine->classe->nameClass }}</td>
                        <td  scope="col" >{{ $routine->classroom->description }}  </td>
                        <td  scope="col" >{{ $routine->start_time }}</td> 
                        <td  scope="col" >{{ $routine->end_time }}</td> 
                      </tr>
                      
                      @endforeach
                  </tbody>
                </table>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection