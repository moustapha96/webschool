@extends('backend.layouts.template')


@section('title')
<h3 class="card-title">Modifier une Salle de classe</h3>

@endsection
@section('option')
<a href="{{ route('admin.classrooms.index') }}"
class="btn btn-info float-right btn-sm" role="button">Liste des salles</a>

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">

    <form class="form-group" action="{{ route('admin.classrooms.update', $classroom->id) }}"
        method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">{{ __('Nom de la Salle') }}</label>
                <input type="text" name="name"
                    class="form-control  @error('name') is-invalid @enderror" id="code"
                    placeholder="code de la salle" value="{{ $classroom->name }}" required>
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
                <button type="submit" class="pull-right btn btn-info"><i
                        class="fa fa-sign-in fa-lg fa-fw"></i>
                    {{ __('enregistrer les modifications') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

