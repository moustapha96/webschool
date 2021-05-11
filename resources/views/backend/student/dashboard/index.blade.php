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

  <div class="col-md-6 ">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
      <div class="info">
        <h4>Livres</h4>
        <p><b>{{ $livres->count() }}</b></p>
      </div>
    </div>
  </div>
 
  <div class="col-md-6 ">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
      <div class="info">
        <h4>Livres Empruntés</h4>
        <p><b>{{ $livres_emprunte->count() }}</b></p>
      </div>
    </div>
  </div>
</div>



</main>
@endsection


