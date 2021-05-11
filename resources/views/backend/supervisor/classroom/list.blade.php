{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-meetup" aria-hidden="true"></i>
                    Salle de Classe</h1>
                <p>Liste des salles de classes</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('classroom.create') }}" class="btn btn-outline-success" role="button">Ajouter une
                        salle de classe</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
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
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;">
                                        <th scope="col" style="width: 10%">Nom Salle</th>
                                        <th scope="col" style="width: 10%">Description</th>
                                        <th scope="col" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataC as $classroom)
                                        <tr>
                                            <td scope="col" style="width: 10%">{{ $classroom->name }}</td>
                                            <td scope="col" style="width: 10%">{{ $classroom->description }}</td>
                                            <td scope="col" style="text-align: center; width: 10%">
                                                <a class="btn btn-warning"
                                                    href="{{ route('classroom.edit', $classroom->id) }}" role="button">
                                                    Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('classroom.delete', $classroom->id) }}" role="button">
                                                    Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();

    </script>

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
                                    <h1><i class="fa fa-meetup" aria-hidden="true"></i>
                                        Salle de Classe</h1>
                                    <p>Liste des salles de classes</p>

                                </div>
                                <div class="col-md-6">


                                    <a href="{{ route('classroom.create') }}" class="btn btn-success float-right btn-sm"
                                        role="button"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>

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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 10%">Nom Salle</th>
                                        <th scope="col" style="width: 10%">Description</th>
                                        <th scope="col" style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataC as $classroom)
                                        <tr>
                                            <td scope="col" style="width: 10%">{{ $classroom->name }}</td>
                                            <td scope="col" style="width: 10%">{{ $classroom->description }}</td>
                                            <td scope="col" style="text-align: center; width: 10%">
                                                <a class="btn btn-warning"
                                                    href="{{ route('classroom.edit', $classroom->id) }}" role="button">
                                                    Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('classroom.delete', $classroom->id) }}" role="button">
                                                    Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" style="width: 10%">Nom Salle</th>
                                        <th scope="col" style="width: 10%">Description</th>
                                        <th scope="col" style="width: 10%">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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