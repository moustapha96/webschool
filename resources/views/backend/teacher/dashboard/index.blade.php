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
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-laptop fa-3x"></i>
        <div class="info">
          <h4>Nombre de Cours </h4>
          <p><b>{{ Auth()->user()->teacher->assign_subject->count() }}</b></p>
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
    <div class="col-md-6 col-lg-6">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
        <div class="info">
          <h4>étudiants</h4>
          <p><b>{{ $students->count() }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
        <div class="info">
          <h4>Filles</h4>
          <p><b>{{ $filles->count() }}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
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
  <div class="col-md-6 ">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-graduation-cap fa-3x"></i>
      <div class="info">
        <h4>Nombre d'abscence</h4>
        <p><b>{{ $abscence->count() }}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 ">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
      <div class="info">
        <h4>Professeurs</h4>
        <p><b>{{ $teachers->count() }}</b></p>
      </div>
    </div>
  </div>

</div>



</main>
@endsection


