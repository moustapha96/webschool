@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des classes </h1>
<p>Modifier une classe</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <form method="Post" action="{{ route('classes.update', $classe->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label for="classeroom_id">Salle de classe:</label>
                            <input type="text" class="form-control" name="classeroom_id"
                                value="{{ $classe->classeroom_id }}" />
                        </div>
                        <div class="form-group">
                            <label for="idClasse">classe:</label>
                            <input type="text" class="form-control" name="nameClass"
                                value="{{ $classe->nameClass }}" />
                        </div>
                        <div class="form-group">
                            <label for="ine">Code:</label>
                            <input type="text" class="form-control" name="code"
                                value="{{ $classe->code }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

