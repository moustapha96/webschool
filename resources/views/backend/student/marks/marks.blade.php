
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Notes contrôles</h1>
            <p>Vos notes de controles</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn btn-outline-success" role="button" >Retour</a>
          </li>
        </ul>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <h3> Notes</h3>
         
          
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
              <thead>
                <tr>
                  <th>UE</th>
                  <th>matiere</th>
                  <th>Type controle</th>
                  <th>Note</th>

                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($notes as $note)
                    <tr>
                      <td>{{ $note->subject->unitie->code }}-{{ $note->subject->unitie->name }}</td>
                      <td>{{ $note->subject->name }}</td>
                      <td>{{ $note->typeNote }}</td>
                      <td>{{ $note->mark_value }}</td>
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


