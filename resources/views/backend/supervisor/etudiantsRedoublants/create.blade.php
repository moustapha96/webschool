@extends('backend.layouts.main')


@section ('seo')

@endsection


@section('main')
<section class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i>Ajouter un rédoublant </h1>
            <p>ajouter un étudiant redoublé</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i class="fa fa-reply"></i> Retour</a></li>

        </ul>
    </div>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" >{{ __('Student') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('etudiantsRedoublants.validation') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                           <label for="idStudent" class="col-md-2 col-form-label text-md-right">{{ __('etudiant') }}</label>
                            <div class="col-md-4">
                                <select name="idStudent" id="idStudent" class="select2_single form-control" >
                                        @foreach($student as $students)
                                        <option value="{{ $students->id}}">{{ $students->ine}}</option>
                                        @endforeach
                                </select>
                            @error('idStudent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
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
<script>

</script>

@endsection
