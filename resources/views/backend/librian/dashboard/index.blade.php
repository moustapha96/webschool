@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>
 
<div class="container">

  <div class="row">
    <div class="col-md-6">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-year fa-3x"></i>
        <div class="info">
          <h4>Année académique {{ $academic_year->value }}</h4>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="widget-small primary coloured-icon">
          <i class="icon fa fa-bell  fa-inverse text-warning fa-3x"></i>
        <div class="info">
          <h4>{{  auth()->user()->unreadNotifications->count() }} notification(s)</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 col-lg-4 ">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
        <div class="info">
          <h4>étudiants</h4>
          <p><b>{{ $students->count() }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-lg-4">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
        <div class="info">
          <h4>Filles</h4>
          <p><b>{{ $filles->count() }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-lg-4">
      <div class="widget-small tertiary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
        <div class="info">
          <h4>Garçons</h4>
          <p><b>{{ $garcons->count() }}</b></p>
        </div>
      </div>
    </div>
  </div>    
</div>

<div class="row">

  <div class="col-md-6 col-lg-6">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
      <div class="info">
        <h4>Livres</h4>
        <p><b>{{ $livres->count() }}</b></p>
      </div>
    </div>
  </div>
 
  <div class="col-md-6 col-lg-6">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
      <div class="info">
        <h4>Livres Empruntés</h4>
        <p><b>{{ $livres_emprunte->count() }}</b></p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="card-body table-responsive">
      <table class="table  table-hover" id="sampleTable">
        <thead class="text-warning">
          <th>ID</th>
          <th>livre</th>
          <th>Auteur</th>
          <th>Quantité</th>
        </thead>
        <tbody>
          @foreach($livres as $livre)
          <tr>
            <td>{{ $livre->id }}</td>
            <td>{{ $livre->name }}</td>
            <td>{{ $livre->author }}</td>
            <td>{{ $livre->quantity }}</td>
          </tr>
            
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card-body table-responsive">
      <table class="table  table-hover" id="sampleTable">
        <thead class="text-warning">
          <th>ID</th>
          <th>livre</th>
          <th>Auteur</th>
        </thead>
        <tbody>
          @foreach($livres_emprunte as $livre_em)
          <tr>
            <td>{{ $livre_em->id }}</td>
            <td>{{ $livre_em->book->name }}</td>
            <td>{{ $livre_em->book->author }}</td>
          </tr>
            
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
{{-- petit description --}}



</main>
@endsection




@section('scripts')
<!-- Data table plugin-->
<script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>




@endsection