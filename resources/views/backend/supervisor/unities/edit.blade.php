@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Unité d'enseignement</h1>
            <p>Modification d'une unité d'enseignement </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

        </ul>
    </div>
  <div class="row">
  <div class="col-sm-8 offset-sm-2">
      <div class="tile">
        <div class="tile-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="Post" action="{{ route('unities.update', $unity->id) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="ine" value="{{ $unity->name }}" />
            </div>
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" name="ine" value="{{ $unity->code }}" />
            </div>
            <div class="form-group">
                <label for="class_id">classe:</label>
                <select name="class_id" id="idClasse" class="select2_single form-control" >
                    @foreach($classe as $classes)
                    <option value="{{ $classes->id}}">{{ $classes->nameClass}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="semestre_id">semestre:</label>
                <select name="class_id" id="idClasse" class="select2_single form-control" >
                    @foreach($semester as $semesters)
                    <option value="{{ $semesters->id}}">{{ $semesters->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" name="ine" value="{{ $unity->code }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


@section('scripts')

@endsection
