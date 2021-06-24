@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des Rôles</h3>
    <br>
    <p> <strong> Atttribution des rôles : Modification</strong> </p>
@endsection
@section('option')
   
@endsection
@section('option-panel')
  
@endsection
@section('data')
    <div class="card-block card-dashboard">
        <div class="card">
            <div class="tile p-4 ">
                <div  class="">
                    <div class="">
                        <form action="{{ route('admin.role.attribution.update',$user->id) }}" method="post">
                            @csrf
                            <div class="form-group row ">
                                <h3 for="user">utilisateur : <strong> {{ $user->prenom.' '.$user->nom }} ->role:  {{ $user->role }} </strong></h3>
                            </div>

                            <div class="form-check">
                                <legend>rôles</legend>
                                <div class="form-group col-md-12">
                                    @foreach ($roles as $value)
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input form-control" name="role[]"
                                                id="role" value="{{ $value->name }}"> {{ $value->name }}
                                        </label> <br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success"> <i class="fa fa-file" aria-hidden="true"></i> mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
