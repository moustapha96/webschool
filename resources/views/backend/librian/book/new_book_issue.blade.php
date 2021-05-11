
@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Emprunter un livre </h1>
            <p>Ajout d'un nouveau emprunt</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}" class="btn btn-outline-dark" role="button" >retour</a>
          </li>
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
            <div class="tile">
                <div class="tile-body">

                    <section class="container" >
                        <div class="logo" style="text-align: center">
                           
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                <img src="{{ asset('images/settings/logo.png') }}" alt="App'School" height="90px">
                                <h5> Ajouter un Emprunt </h5>   
                               </div>
                               <div class="form-group col-md-1">
                               </div>
                          </div>
                            
                           
                        </div>

                        <div>
                            <form  method="POST" action="{{ route('librian.book_issu.save') }}" >
                                @csrf
                                @method('POST')

                            
                                <div class="form-group col-md-12">
                                    <label for="student">{{ __('étudiant') }}</label>
                                       
                                    <select  class="form-control" name="student_id" id="student" required>
                                        <option></option>
                                        @foreach($students as $student)
                                        <option  value="{{ $student->id }}">{{ $student->ine }}-{{ $student->user->prenom }}-{{ $student->user->nom }} </option>
                                        
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="livre">{{ __('Livre') }}</label>
                                       
                                        <select  class="form-control" name="book_id" id="livre" required>
                                            <option></option>
                                            @foreach($livres as $livre)
                                               <option  value="{{ $livre->id }}" >  {{ $livre->name }} </option>
                                            
                                            @endforeach
                                        </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="issue_date">{{ __('Date emprunt') }}</label>
                                    <input type="date" format="YYYY-MM-DD" value="{{ date('Y-m-d') }}" name="issue_date" class="form-control  @error('issue_date') is-invalid @enderror" 
                                    id="issue_date"   required >
                                        @error('issue_date')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="due_date">{{ __('due emprunt') }}</label>
                                    <input type="date" format="YYYY-MM-DD" name="due_date" class="form-control  @error('due_date') is-invalid @enderror" 
                                    id="due_date"  value="{{ date('Y-m-d')  }}" required >
                                        @error('due_date')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="return_date">{{ __('Date de retour') }}</label>
                                    <input type="date" name="return_date" class="form-control  @error('return_date') is-invalid @enderror" 
                                    id="return_date" value="{{ date('Y-m-d')  }}"  required >
                                        @error('return_date')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="comment">{{ __('Commentaire') }}</label>
                                    <input type="text" name="comment" class="form-control  @error('comment') is-invalid @enderror" 
                                    id="comment" placeholder="commentaire du livre"  required >
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                               
                                <div class="row" >

                                    <div class="mx-auto">

                                        <button type="submit" class="pull-right btn btn-primary"><i class="fa fa-sign-in fa-lg fa-fw"></i>
                                               {{ __('enregistrer ') }}
                                        </button>
                                    </div>
                                </div>
                               
                                

                            </form>

                           
                            
                        </div>

                        
                    </section>

                </div>
            </div>
        </div>
    </div>


</main>


@endsection


@section('scripts')

@endsection














