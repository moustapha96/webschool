

@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-suitcase"></i>Notifications </h1>
            <p> Nouveau messages </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"> 
                <a href="{{ url()->previous() }}"  
                    class="btn btn-outline-dark" role="button" >Retour</a>
            </li>
        </ul> 
      </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                @if(Session::has('error'))
                <div class="alert alert-danger">
                {{ Session::get('error') }}
                </div>
              @endif
                <div class="tile-body">




                    <section class="container" >
                        <div class="logo" style="text-align: center">
                           
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                <img src="{{ asset('images/settings/logo.png') }}" alt="App'School" height="90px">
                                <h5> Nouveau Message </h5>   
                               </div>
                               <div class="form-group col-md-1">
                               </div>
                          </div>
                            
                           
                        </div>

                        <div>
                            <form  method="POST" action="{{ route('messagesTeacher.store') }}" id="form_id" >
                                @csrf
                                @method('POST')
                        
                            <div class="col-md-12"  align="center">
                                <div class="form-row col-md-12">
                                    <label for="subject">{{ __('subject') }}</label>
                                    <input  type="text"  name="subject" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" placeholder="subject"   required >
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row col-md-12">
                                    <label for="email">{{ __('destinataire') }}</label>
                                    <input  type="email"  name="email[]" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                
                                <div class="form-row col-md-12">
                                    <label for="body">{{ __('body') }}</label>
                                    <textarea  name="body" class="form-control  @error('body') is-invalid @enderror" 
                                    id="body" placeholder="body" rows="4"  required ></textarea>
                                        @error('body')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                               
                                <div class="form-row col-md-12">
                                    <div class="form-group col-md-6"></div>
                                    <div class="form-group col-md-6">
    
                                        <button type="submit"  class="pull-right btn btn-outline-primary"><i class="fa fa-send "></i>
                                               {{ __('envoyer ') }}
                                        </button>
                                    </div>
    
                                    
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















