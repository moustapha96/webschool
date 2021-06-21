
@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des Classes</h1>
<p>Modification d'une classe</p>
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
                        action="{{ route('classes1.update1', $classe->id) }}" method="POST">

                        @csrf


                        <div class="form-group col-md-12">
                            <label for="nameClass">{{ __('Nom de la classe') }}</label>
                            <input type="text" name="nameClass"
                                class="form-control  @error('nameClass') is-invalid @enderror"
                                id="code" placeholder="code de la classe"
                                value="{{ $classe->nameClass }}" required>
                            @error('nameClass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="code">{{ __('Code classe') }}</label>
                            <input type="text" name="code"
                                class="form-control  @error('code') is-invalid @enderror" id="code"
                                placeholder="code de la classe" value="{{ $classe->code }}"
                                required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

