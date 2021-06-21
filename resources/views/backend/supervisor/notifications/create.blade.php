@extends('backend.layouts.template')


@section('title')
    <h3>Nouveau Message </h3>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <section class="container">
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
            <form method="POST" action="{{ route('messagesSupervisor.store') }}" id="form_id">
                @csrf
                @method('POST')

                <div class="col-md-12" align="center">
                    <div class="form-row col-md-12">
                        <label for="subject">{{ __('subject') }}</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                            id="subject" placeholder="subject" required>
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-row col-md-12">
                        <label for="email">{{ __('destinataire') }}</label>
                        <input type="email" name="email[]" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-row col-md-12">
                        <label for="group">{{ __('Groupe ') }}</label>
                        <select id="group" name="group" class="form-control">
                            <option value=""> </option>
                            @foreach ($options as $group)
                                <option value="{{ $group }}">{{ $group }} </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-row col-md-12">
                        <label for="body">{{ __('body') }}</label>
                        <textarea name="body" class="form-control  @error('body') is-invalid @enderror" id="body"
                            placeholder="body" rows="4" required></textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6"></div>
                        <div class="form-group col-md-6">

                            <button type="submit" class="pull-right btn btn-outline-primary"><i class="fa fa-send "></i>
                                {{ __('envoyer ') }}
                            </button>
                        </div>


                    </div>
                </div>


            </form>
        </div>


    </section>
@endsection
