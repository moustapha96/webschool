
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')


<main class="app-content">

    <div class="app-title">
        <div>
            <h1><i class="fa fa-suitcase"></i>Gestion des dossiers étudiants</h1>
            <p>Liste des dossiers scolaire</p>
        </div>
       
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
                            <h2>Dossier Etudiant</h2>
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>classe actuelle</th>
                                        <th>INE</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $student->user->prenom }}</td>
                                            <td>{{ $student->user->nom }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>{{ $student->classe->nameClass }}</td>
                                            <td>{{ $student->ine }}</td>
                                            <td>
                                                <a href="{{ route('student.student_dossier',$student) }}" class="btn btn-outline-warning">dossier scolaire</a>
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

