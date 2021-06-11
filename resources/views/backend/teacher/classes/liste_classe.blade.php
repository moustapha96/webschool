
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">

  <div class="app-title">
    <div>
      <h1><i class="fa fa-suitcase"></i>Liste des Matières</h1>
        <h5 class="mt-2" > Liste de vos matières </h5>
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
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
              <thead>
                <tr>
                  <th>classe</th>
                  <th>semestre</th>
                  <th>UE</th>
                  <th>matiere</th>
                  <th>action</th>

                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($teacher->assign_subject as $assign_subject)
                    <tr>
                        <td>{{ $assign_subject->subject->unitie->semester->classe->niveau->code .' '. $assign_subject->subject->unitie->semester->classe->filiere->code}}</td>
                        <td>{{ $assign_subject->subject->unitie->semester->name }}</td>
                        <td>{{ $assign_subject->subject->unitie->name }} </td>
                        <td>{{ $assign_subject->subject->name }} </td>

                        <td>
                            <a href=" {{ route('teacher.students.liste_student', $assign_subject) }}" class="btn btn-info">notes étudiants</a>

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


