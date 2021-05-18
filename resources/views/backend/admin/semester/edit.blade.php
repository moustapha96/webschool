@extends('backend.layouts.main')


@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
                                    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Semestres</h1>
                                    <p class="mt-2">Modification d'un semestre</p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-outline-primary float-right " href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a>
                                </div>
                            </div>

                            <hr>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <form class="form-group" action="{{ route('admin.semester.update', $semester) }}"
                                method="POST">

                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="code">{{ __('Code Semestre') }}</label>
                                        <input type="text" name="code" value="{{ $semester->code }}"
                                            class="form-control  @error('code') is-invalid @enderror" id="code"
                                            placeholder="Code semestre" required>
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="name">{{ __('Nom semestre') }}</label>
                                        <input type="text" name="name" value="{{ $semester->name }}"
                                            class="form-control  @error('name') is-invalid @enderror" id="name"
                                            placeholder="nom du semestre" required>
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
                                            @foreach ($classes as $x)
                                                <option value="{{ $x->id }}"
                                                    {{ $x->id == $semester->class_id ? 'selected' : '' }}>
                                                    {{ $x->code }}
                                                    -- {{ $x->nameClass }} </option>
                                            @endforeach
                                        </select>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>

@endsection
