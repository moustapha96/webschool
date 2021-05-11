@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">

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
                <label for="idClasse">User:</label>
                <select name="idUser" id="idUser" class="select2_single form-control" >
                    @foreach($user as $users)
                    <option value="{{ $users->id}}">{{ $users->prenom}}  {{ $users->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="idClasse">IdClasse:</label>
                <select name="idClasse" id="idClasse" class="select2_single form-control" >
                    @foreach($classe as $classes)
                    <option value="{{ $classes->id}}">{{ $classes->nameClass}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ine">INE:</label>
                <input type="text" class="form-control" name="ine" value="{{ $student->ine }}" />
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
