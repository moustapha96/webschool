@extends('backend.layouts.main')


@section('styles')
 
@endsection


@section('main')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Nouvelle Salle de classe</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.classrooms.index') }}" class="btn btn-info float-right btn-sm" role="button" >Liste des salles</a>
                                </div>
                            </div>
                            
                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <form class="form-group" action="{{ route('admin.classrooms.store') }}" method="POST">
           
                                @csrf
                               
                    
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                      <label for="name">{{ __('Nom de la Salle') }}</label>
                                      <input  type="text"  name="name" class="form-control @error('name') is-invalid @enderror"
                                      id="name" placeholder="Nom de la salle" value="{{ old('name') }}"  required >
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="form-group col-md-12">
                                      <label for="description">{{ __('Déscription de la salle') }}</label>
                                      <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" 
                                      id="description" placeholder="Description de la salle"  required value="{{ old('description') }}">
                                          @error('description')
                                              <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                  </div>
                                </div>
                                 
                               
                                <div class="row">
                                  <div class=" mx-auto align-content-center">
                                    <button type="submit" class="pull-right btn btn-info"><i class="fa fa-sign-in fa-lg fa-fw"></i>
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
    </section>
@endsection

@section('scripts')



@endsection
