
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">

      <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Liste  étudiants </h1>
            <p>Liste de vos étudiants</p>
        </div>
        
    </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
              <thead>
                <tr>
                  <th>prenom</th>
                  <th>nom</th>
                  <th>classe</th>
                  <th>email</th>
                  <th>tel</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Le corps du tableau ici -->
                @foreach($parents as $parent)
                      <tr>
                        <td>{{ $parent->student->user->prenom }} </td>
                        <td>{{ $parent->student->user->nom }} </td>
                        <td>{{ $parent->student->classe->nameClass }} </td>
                        <td>{{ $parent->student->user->email }} </td>
                        <td>{{ $parent->student->user->tel }} </td>
                        <td>
                            <a href="{{ route('parent.student',$parent->student) }}" class="btn btn-outline-secondary">Notes</a>
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


<!-- Toogle plugin-->
<link rel="stylesheet" href="css/bootstrap-toggle.min.css">
<script type="text/javascript" src="{{ asset('js/plugins/bootstrap-toggle.min.js') }}"></script>

<script>
  $(function() {
    $('.toggle-class').change(function() {
      //recupere valeur status qui est egale a 1 si le checkbox est coché 0 sinon 
        var status = $(this).prop('checked') == true ? 1 : 0; 
      //recupere l'id du user'
        var user_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              alert(data.success);
            }
        });

    });
  });
</script>

@endsection


