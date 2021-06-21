@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-meetup" aria-hidden="true"></i>
        Nouvelle Salle de classe</h1>
@endsection
@section('option')
    <a href="{{ route('admin.classrooms.index') }}" class="btn btn-info float-right btn-sm" role="button">Liste des
        salles</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <form class="form-group" action="{{ route('admin.classrooms.store') }}" method="POST">

                            @csrf


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nom de la Salle') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nom de la salle" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">{{ __('Déscription de la salle') }}</label>
                                    <input type="text" name="description"
                                        class="form-control  @error('description') is-invalid @enderror" id="description"
                                        placeholder="Description de la salle" required value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class=" mx-auto align-content-center">
                                    <button type="submit" class="pull-right btn btn-info"><i
                                            class="fa fa-sign-in fa-lg fa-fw"></i>
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
