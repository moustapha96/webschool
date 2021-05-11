@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-calendar" aria-hidden="true"></i>Emploie du temps</h1>
        <h2>Modifictaion Emploie du temps de la {{ $classRoutine->classe->code }}</h2>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
      @endif
      @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      @endif
   </div>
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
         
          <form class="form-group" action="{{ route('emploi.update', $classRoutine->id) }}" method="post">

            @csrf
             
			      <div class="form-row">

              <div class="form-group col-md-12">
                <label for="classe_id">Nom de la classe: </label>
                <select id="classe_id" name="classe_id" class="form-control">
                  @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ $classRoutine->classe_id == $classe->id ? 'selected' : '' }}>{{ $classe->nameClass }}</option>
                  @endforeach
                </select>
              </div>  

                <div class="form-group col-md-12">
                  <label for="classroom">Nom de la Salle de classe: </label>
                  <select id="classroom" name="classroom_id" class="form-control">
                    @foreach($classrooms as $x)
                      <option value="{{ $x->id }}" {{ $classRoutine->classroom_id == $x->id ? 'selected' : '' }}>{{ $x->description }}</option>
                    @endforeach
                  </select>
                </div>                
              

              
                <div class="form-group col-md-12">
                  <label for="subject"> Matiere : (Matiere-Unité-Semestre-Classe)</label>
                  <select id="subject" name="subject_id" class="form-control">
                    @foreach($subjects as $subject )
                      <option value="{{ $subject->id }}"{{ $classRoutine->subject_id == $subject->id ? 'selected' : '' }}> {{ $subject->name }}--{{ $subject->unitie->name }}--{{ $subject->unitie->semester->name }}--{{ $subject->unitie->semester->classe->nameClass }} </option>
                    @endforeach
                  </select>
                </div>                
               
             
                <div class="form-group col-md-12">
                  <label for="teacher"> Professeur: </label>
                  <select id="teaccher" name="teacher_id" class="form-control">
                    @foreach($teachers as $teacher )
                      <option value="{{ $teacher->user_id }}"{{ $classRoutine->teacher_id == $teacher->user_id ? 'selected' : '' }}> {{ $teacher->user->prenom }} {{$teacher->user->prenom}}</option>
                    @endforeach
                  </select>
                </div>                
             

             
                 <div class="form-group col-md-12">
                   <label for="day"> JOUR </label>
                   <select id="day" name="day" class="form-control">
                        <option value="{{ $classRoutine->day }}"> {{ $classRoutine->day }}</option>
                        <option value="Mardi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                   </select>
                     @if( $errors->has('day') )
                       <p class="help id-danger" >  {{ $errors->first('day') }}  </p>
                     @endif
                 </div>
             

                 <div class="form-group col-md-12">
                  <label for="start_hour">{{ __('Début cours') }}</label>
                  <input type="time" name="start_time" class="form-control  @error('start_time') is-invalid @enderror" 
                  id="start_time" placeholder="début du cours de la salle" value="{{ $classRoutine->start_time }}" required >
                      @error('start_time')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>

            
                <div class="form-group col-md-12">
                  <label for="end_time">{{ __('Fin cours') }}</label>
                  <input type="time" name="end_time" class="form-control  @error('end_hour') is-invalid @enderror" 
                  id="end_time" placeholder="début du cours de la salle" value="{{ $classRoutine->end_time }}" required >
                      @error('end_time')
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>

			      </div>
          
            <div class="row">
              <div class=" mx-auto align-content-center">
                <button type="submit" class="pull-right btn btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>
                  {{ __('enregistrer les modifications') }}
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection


@section('scripts')

@endsection