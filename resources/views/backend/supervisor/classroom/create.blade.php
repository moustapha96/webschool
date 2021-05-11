{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-meetup" aria-hidden="true"></i>
                    Salle de Classe</h1>
                <p>Ajout d'une salle de classe</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <form class="form-group" action="{{ route('classroom.store') }}" method="POST">

                            @csrf


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nom de la Salle') }}</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id="name" placeholder="nom de la salle" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">{{ __('Déscription de la salle') }}</label>
                                    <input type="text" name="description"
                                        class="form-control  @error('description') is-invalid @enderror" id="description"
                                        placeholder="description de la salle" required>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class=" mx-auto align-content-center">
                                    <button type="submit" class="pull-right btn btn-primary"><i
                                            class="fa fa-sign-in fa-lg fa-fw"></i>
                                        {{ __('enregistrer') }}
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

@endsection --}}




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
                                    <h1><i class="fa fa-meetup" aria-hidden="true"></i>
                                        Salle de Classe</h1>
                                    <p>Ajout d'une salle de classe</p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-info float-right btn-sm" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a></li>

                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <div class="row">

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
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tile">
                                        <div class="tile-body">

                                            <form class="form-group" action="{{ route('classroom.store') }}"
                                                method="POST">

                                                @csrf


                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name">{{ __('Nom de la Salle') }}</label>
                                                        <input type="text" name="name"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" placeholder="nom de la salle" required>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label
                                                            for="description">{{ __('Déscription de la salle') }}</label>
                                                        <input type="text" name="description"
                                                            class="form-control  @error('description') is-invalid @enderror"
                                                            id="description" placeholder="description de la salle" required>
                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class=" mx-auto align-content-center">
                                                        <button type="submit" class="pull-right btn btn-primary"><i
                                                                class="fa fa-sign-in fa-lg fa-fw"></i>
                                                            {{ __('enregistrer') }}
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
