
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-calendar" aria-hidden="true"></i>Emploie du temps</h1>
        <h4 class="mt-2">Choix de la classe</h4>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-success">
         {{ Session::get('success') }}
      </div>
      @endif
  </div>
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

        <form class="form-group"  action="{{ route('emploi.list') }}" method="POST">
         @csrf

            <div class="form-row">
                <div class="form-group col-md-2">
                    <h3 for="classe"> Classe : </h3>          
                </div>
                <div class="form-group col-md-7">
                  <select id="code" name="code" class="form-control">
                    @foreach($classes as $classe )
                      <option value="{{ $classe->code }}"> {{ $classe->code }} - {{ $classe->nameClass}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <button type="submit" class="btn btn-primary" role="search" > VOIR EMPLOI DU TEMPS</button> 
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection


@section('scripts')

@endsection