@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Matieres</h1>
    <p>Modification une matiere</p>

@endsection
@section('option')
    <a class="btn btn-info float-right btn-sm" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <form class="form-group" action="{{ route('matiere.updateM', $subject) }}" method="POST">
                            @csrf


                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="inputState"> Nom UE: </label>
                                    <select id="inputState" name="unity_id" class="form-control">
                                        <option></option>
                                        @foreach ($unities as $unity)
                                            <option value="{{ $unity->id }}"
                                                {{ $subject->unity_id == $unity->id ? 'selected' : '' }}>
                                                {{ $unity->name }} -- {{ $unity->semester->code }}
                                                --
                                                {{ $unity->semester->classe->code }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nom de la Matiére') }}</label>
                                    <input type="text" name="name" value="{{ $subject->name }}"
                                        class="form-control  @error('name') is-invalid @enderror" id="start_time"
                                        placeholder="Nom de la matiere" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="coefficient">{{ __('Coéfficient') }}</label>
                                    <input type="number" name="coefficient" value="{{ $subject->coefficient }}"
                                        class="form-control  @error('coefficient') is-invalid @enderror" id="coefficient"
                                        placeholder="coefficient de la matiere" required>
                                    @error('coefficient')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mx-auto align-content-center">
                                    <button type="submit" class="btn btn-primary" name="button">enregistrer
                                        modification</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
