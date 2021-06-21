@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Inscription des étudiants </h1>
    <p>Inscrire un étudiant</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="tile">
        <div class="tile-body">

            <form class="form-group" action="{{ route('reinscription_student.saveAccepte', $student->id) }}" method="POST">
                @csrf


                <div class="form-row">



                    <div class="form-group col-md-12">
                        <label for="name">{{ __('Prenom') }}</label>
                        <input type="text" value="{{ $student->user->prenom }}" disabled class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name">{{ __('Nom') }}</label>
                        <input type="text" value="{{ $student->user->nom }}" disabled class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name">{{ __('INE') }}</label>
                        <input type="text" value="{{ $student->ine }}" disabled class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name">{{ __('Classe Actuelle') }}</label>
                        <input type="text" value="{{ $student->classe->nameClass }}" disabled class="form-control">
                    </div>


                    <div class="form-group col-md-12">
                        <label for="class_id"> Classe: </label>
                        <select id="class_id" name="class_id" class="form-control">
                            <option></option>
                            @foreach ($classes as $x)
                                <option value="{{ $x->id }}"> {{ $x->code }} -- {{ $x->nameClass }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mx-auto align-content-center">
                        <button type="submit" class="btn btn-primary" name="button">enregistrer reinscription</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
