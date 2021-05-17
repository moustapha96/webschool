
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Semestres</h1>
        <p class="mt-2">Modification d'un semestre</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

    </ul>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
         
          <form class="form-group" action="{{ route('semester.updateS',$semester->id) }}" method="POST">
        
            @csrf
            
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="code">{{ __('Code Semestre') }}</label>
                <input type="text" name="code" value="{{ $semester->code }}" class="form-control  @error('code') is-invalid @enderror" 
                id="code" placeholder="Code semestre" required >
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="form-group col-md-12">
                <label for="name">{{ __('Nom semestre') }}</label>
                <input type="text" name="name" value="{{ $semester->name }}" class="form-control  @error('name') is-invalid @enderror" 
                id="name" placeholder="nom du semestre"  required >
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
                  @foreach( $classes as $x )
                    <option value="{{ $x->id }}" {{ $x->id == $semester->class_id ? 'selected': '' }} > {{ $x->code }} -- {{ $x->nameClass }}  </option>
                  @endforeach
                </select>
              </div>  

           </div>
            <div class="row">
               <div class="mx-auto align-content-center">
                  <button type="submit" class="btn btn-primary" name="button">enregistrer modification</button>
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