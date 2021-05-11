
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Réclamations</h1>
            <p>Vos notifications</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a  data-toggle="modal" data-target="#modal_add" class="btn btn-success" role="button" >Faire une réclamation</a>
          </li>
        </ul>
      </div>
          {{-- modal  add mark--}}
    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">  
            <h5 class="modal-title" id="exampleModalCenterTitle">Faire une Réclamations </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <form action="{{ route('student.addreclamation') }}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label for="commentaire">Commentaire</label>
                        <textarea  required name="commentaire" id="commentaire"  
                                class="form-control @error('commentaire') is-invalid @enderror" 
                                placeholder="le motif de votre reclamation"></textarea>
                        @error('commentaire')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-success">Envoyer</button>
                    </div>
                </form>
                </div>
            </div>
        
        </div>
        </div>
    </div>
    {{-- fin modal --}}
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
          
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Date Messages</th>
                  <th>Reclamations</th>
                  <th>action</th>

                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($student->reclamationEtudiant as $rc)
                    <tr>
                      <td>{{ $rc->id }} </td>
                      <td>{{ $rc->reclamation->dateRecla }}</td>
                      <td>{{ $rc->reclamation->commentaire }}</td>
                      <td>
                          <a href="{{ route('student.deletereclamation',$rc->id) }}" class="btn btn-danger">supprimer</a>
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


