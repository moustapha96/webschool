
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-users"></i>Cours</h1>
            <p>Liste de vos cours</p>
        </div>
      </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
         
          
         
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


