@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-meetup" aria-hidden="true"></i>
    Salle de Classe</h1>
<p>Modification d'une salle de classe</p>
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

                    <form class="form-group"
                        action="{{ route('classroom.update', $classroom->id) }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">{{ __('Nom de la Salle') }}</label>
                                <input type="text" name="name"
                                    class="form-control  @error('name') is-invalid @enderror"
                                    id="code" placeholder="code de la salle"
                                    value="{{ $classroom->name }}" required>
                                @error('salle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description">{{ __('Description') }}</label>
                                <input type="text" name="description"
                                    class="form-control  @error('description') is-invalid @enderror"
                                    id="description" placeholder="description de la salle"
                                    value="{{ $classroom->description }}" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class=" mx-auto align-content-center">
                                <button type="submit" class="pull-right btn btn-primary"><i
                                        class="fa fa-sign-in fa-lg fa-fw"></i>
                                    {{ __('enregistrer les modifications') }}
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
