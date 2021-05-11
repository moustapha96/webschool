{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users" aria-hidden="true"></i>Liste des Classes</h1>
                <h4 class="mt-2">Liste des classes</h4>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('classes1.create1') }}" class="btn btn-outline-success" role="button">ajouter une
                        classe</a>
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
                                    <tr>
                                        <th scope="col" style="width: 10%">Nom Classe</th>
                                        <th scope="col" style="width: 10%">Code</th>
                                        <th scope="col" style="width: 10%">Salle</th>
                                        <th scope="col" style="width: 10%">Semestre</th>

                                        <th scope="col" style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td scope="col" style="width: 10%">{{ $classe->nameClass }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->code }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->classroom->name }}</td>
                                            <td scope="col" style="width: 10%">

                                                @if ($classe->semester->count() == 0)
                                                    pas de semestre
                                                @else
                                                    <a class="btn btn-outline-info"
                                                        href="{{ route('supervisor.liste_semestre', $classe->id) }}"
                                                        role="button"> {{ $classe->semester->count() }} semestre(s) </a>
                                                @endif

                                            </td>

                                            <td scope="col" style="width: 10%; text-align:center">
                                                <a class="btn btn-warning"
                                                    href="{{ route('classes1.edit1', $classe->id) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('classes1.destroy1', $classe->id) }}"
                                                    role="button">Supprimer</a>
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
                                    <h4 class="card-title">Gestion des classes</h4>
                                </div>
                                <div class="col-md-6">


                                    <a href="{{ route('classes1.create1') }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-reply" aria-hidden="true"></i> Ajouter une classe</a>


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
                                        <th scope="col" style="width: 10%">Nom Classe</th>
                                        <th scope="col" style="width: 10%">Code</th>
                                        <th scope="col" style="width: 10%">Salle</th>
                                        <th scope="col" style="width: 10%">Semestre</th>

                                        <th scope="col" style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td scope="col" style="width: 10%">{{ $classe->nameClass }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->code }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->classroom->name }}</td>
                                            <td scope="col" style="width: 10%">

                                                @if ($classe->semester->count() == 0)
                                                    pas de semestre
                                                @else
                                                    <a class="btn btn-outline-info"
                                                        href="{{ route('supervisor.liste_semestre', $classe->id) }}"
                                                        role="button"> {{ $classe->semester->count() }} semestre(s) </a>
                                                @endif

                                            </td>

                                            <td scope="col" style="width: 10%; text-align:center">
                                                <a class="btn btn-warning"
                                                    href="{{ route('classes1.edit1', $classe->id) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('classes1.destroy1', $classe->id) }}"
                                                    role="button">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" style="width: 10%">Nom Classe</th>
                                        <th scope="col" style="width: 10%">Code</th>
                                        <th scope="col" style="width: 10%">Salle</th>
                                        <th scope="col" style="width: 10%">Semestre</th>

                                        <th scope="col" style="width: 10%">Actions</th>
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
