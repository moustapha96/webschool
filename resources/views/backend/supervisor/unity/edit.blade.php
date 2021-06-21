@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Gestion des UE</h1>
<p class="mt-2">Modification unités d'enseignements</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <form class="form-group" action="{{ route('supervisor.unity.update', $unitie) }}"
        method="post">

        @csrf

        <div class="form-row">

            <div class="form-group col-md-12">
                <label for="code">{{ __('Code : ') }}</label>
                <input type="text" name="code" value="{{ $unitie->code }}"
                    class="form-control  @error('code') is-invalid @enderror" id="code"
                    placeholder="code de l'unité " required aria-describedby="helpId">
                <small id="helpId" class="text-muted">exemple : UE2</small>
                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group col-md-12">
                <label for="name">{{ __('Nom UE : ') }}</label>
                <input type="text" name="name" value="{{ $unitie->name }}"
                    class="form-control  @error('name') is-invalid @enderror" id="name"
                    placeholder="Nom de l'unité " required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="form-group col-md-12">
                <label for="inputState">Semestre: </label>
                <select id="inputState" name="semestre_id" class="form-control">
                    <option></option>
                    @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}"
                            {{ $unitie->semester_id == $semester->id ? 'selected' : '' }}>
                            {{ $semester->code }} -- {{ $semester->classe->nameClass }}
                        </option>
                    @endforeach
                </select>
            </div>



            <div class="form-group col-md-12">
                <label for="credit">{{ __('credit UE : ') }}</label>
                <input type="number" name="credit" value="{{ $unitie->credit }}"
                    class="form-control  @error('credit') is-invalid @enderror" id="credit"
                    placeholder="credit de l'unité " required>
                @error('credit')
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
@endsection

