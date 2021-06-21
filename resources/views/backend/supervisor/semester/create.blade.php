@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Semestres</h1>
    <p class="mt-2">Ajoiut d'un semestre</p>
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
                        <form class="form-group" action="{{ route('supervisor.semester.store') }}" method="post">

                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="code">{{ __('Code Semestre') }}</label>
                                    <input type="text" name="code" class="form-control  @error('code') is-invalid @enderror"
                                        id="code" placeholder="Code semestre" required>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nom semestre') }}</label>
                                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" placeholder="nom du semestre" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputState"> Classe: </label>
                                    <select id="inputState" name="class_id" class="form-control">
                                        <option></option>
                                        @foreach ($classes as $x)
                                            <option value="{{ $x->id }}"> {{ $x->niveau->code }}
                                                --
                                                {{ $x->filiere->code }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="row">
                                <div class="mx-auto align-content-center">
                                    <button type="submit" class="btn btn-primary" name="button">enregistrer</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
