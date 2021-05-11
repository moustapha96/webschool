{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">

        <div class="app-title">
            <div>
                <h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des classes </h1>
                <p>Modifier une classe</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="tile">
                    <div class="tile-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br />
                        @endif
                        <form method="Post" action="{{ route('classes.update', $classe->id) }}">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label for="classeroom_id">Salle de classe:</label>
                                <input type="text" class="form-control" name="classeroom_id"
                                    value="{{ $classe->classeroom_id }}" />
                            </div>
                            <div class="form-group">
                                <label for="idClasse">classe:</label>
                                <input type="text" class="form-control" name="nameClass"
                                    value="{{ $classe->nameClass }}" />
                            </div>
                            <div class="form-group">
                                <label for="ine">Code:</label>
                                <input type="text" class="form-control" name="code" value="{{ $classe->code }}" />
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')

@endsection
 --}}

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
                                    <h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des classes </h1>
                                    <p>Modifier une classe</p>
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

                                            <form method="Post" action="{{ route('classes.update', $classe->id) }}">
                                                @method('PATCH')
                                                @csrf

                                                <div class="form-group">
                                                    <label for="classeroom_id">Salle de classe:</label>
                                                    <input type="text" class="form-control" name="classeroom_id"
                                                        value="{{ $classe->classeroom_id }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="idClasse">classe:</label>
                                                    <input type="text" class="form-control" name="nameClass"
                                                        value="{{ $classe->nameClass }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="ine">Code:</label>
                                                    <input type="text" class="form-control" name="code"
                                                        value="{{ $classe->code }}" />
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
