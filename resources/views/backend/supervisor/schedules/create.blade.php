@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Emploi du temps </h4>
    <p>nouveau emploi du temps </p>
@endsection
@section('option')
    <a href="{{ route('supervisor.schedule.index') }}" class="btn btn-info float-right btn-sm" role="button"> <i
            class="fa fa-list-alt" aria-hidden="true"></i> Liste</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <form class="form-group" action="{{ route('supervisor.schedule.store') }}" method="post">

            @csrf

            <div class="form-row">


                <div class="form-group col-md-12">
                    <label for="classe_id"> Classe : </label>
                    <select id="classe_id" name="classe_id" class="form-control">
                        <option></option>
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->id }}">
                                {{ $classe->nameClass }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-12">
                    <label for="subject"> Matiere : : (Matiere-Unité-Semestre-Classe)</label>
                    <select id="subject" name="subject_id" class="form-control">
                        <option></option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">
                                {{ $subject->name }}--{{ $subject->unitie->name }}--{{ $subject->unitie->semester->name }}--{{ $subject->unitie->semester->classe->nameClass }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-12">
                    <label for="classroom">Nom de la Salle de classe: </label>
                    <select id="classroom" name="classroom_id" class="form-control">
                        <option></option>
                        @foreach ($classrooms as $x)
                            <option value="{{ $x->id }}">{{ $x->name }} -- {{ $x->description }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-12">
                    <label for="teacher"> Professeur: </label>
                    <select id="teaccher" name="teacher_id" class="form-control">
                        <option></option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">Matricule :
                                {{ $teacher->matricule }} -- {{ $teacher->user->prenom }}
                                {{ $teacher->user->nom }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group col-md-12">
                    <label for="day"> JOUR </label>
                    <select id="day" name="day" class="form-control" required>
                        <option></option>
                        <option value="Mardi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                    </select>

                </div>


                <div class="form-group col-md-12">
                    <label for="start_hour">{{ __('Début cours') }}</label>
                    <input type="time" name="start_time" class="form-control  @error('start_time') is-invalid @enderror"
                        id="start_time" placeholder="début du cours de la salle" required>
                    @error('start_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group col-md-12">
                    <label for="end_time">{{ __('Fin cours') }}</label>
                    <input type="time" name="end_time" class="form-control  @error('end_hour') is-invalid @enderror"
                        id="end_time" placeholder="début du cours de la salle" required>
                    @error('end_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="mx-auto align-content-center">
                    <button type="submit" class="pull-right btn btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>
                        {{ __('enregistrer') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection


