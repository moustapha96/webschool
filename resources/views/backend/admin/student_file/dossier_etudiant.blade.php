
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')


<main class="app-content">

  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Dossiers Scolaire</h1>
        <p>Les dossiers des étudiants</p>
    </div>
   
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>
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
      <div class="tile">
      
          <div class="title-body">
                
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Année Academique</th>
                                        <th>Session</th>
                                        <th> Etudiant</th>
                                        <th>Classe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dossiers as $dossier)
                                        <tr>
                                            <td>{{ $dossier->academic_year->year }}</td> 
                                            <td>{{ $dossier->academic_year->session }}</td>
                                            <td>
                                                <a href="{{ route('admin.classes.show_student',$dossier->student) }}" 
                                                class="btn btn-outline-info">
                                                        {{ $dossier->student->user->prenom }}
                                                        {{ $dossier->student->user->nom }} </a>
                                                
                                            </td>
                                            <td>{{ $dossier->bulletin->classe->nameClass }}</td>
                                            <td>
                                                <a href="{{ route('student.bulletin_etudiant',$dossier) }}" 
                                                        class="btn btn-outline-info">bulletin de notes</a>
                                            </td>
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

