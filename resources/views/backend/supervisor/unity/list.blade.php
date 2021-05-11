{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-suitcase"></i>Gestion des UE</h1>
                <p class="mt-2">Liste des unités d'enseignements</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <a class="btn btn-success" href="{{ route('unity.createU') }}" role="button">Ajouter un UE</a>

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
                                        <th scope="col">Code</th>
                                        <th scope="col">Nom UE</th>
                                        <th scope="col">Crédit</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Nom Classe</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($unities as $unity)
                                        <tr>
                                            <td scope="col">{{ $unity->code }}</td>
                                            <td scope="col">{{ $unity->name }}</td>
                                            <td scope="col">{{ $unity->credit }}</td>
                                            <td scope="col">{{ $unity->semester->code }}</td>
                                            <td scope="col">{{ $unity->semester->classe->nameClass }}</td>
                                            <td scope="col">
                                                <a class="btn btn-warning" href="{{ route('unity.editU', $unity->id) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger" href="{{ route('unity.destroyU', $unity->id) }}"
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
    <!-- Data table plugin-->
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
                                    <h1><i class="fa fa-suitcase"></i>Gestion des UE</h1>
                                    <p class="mt-2">Liste des unités d'enseignements</p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-success float-right btn-sm" href="{{ route('unity.createU') }}"
                                        role="button">Ajouter un UE</a>
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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Nom UE</th>
                                        <th scope="col">Crédit</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Nom Classe</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unities as $unity)
                                        <tr>
                                            <td scope="col">{{ $unity->code }}</td>
                                            <td scope="col">{{ $unity->name }}</td>
                                            <td scope="col">{{ $unity->credit }}</td>
                                            <td scope="col">{{ $unity->semester->code }}</td>
                                            <td scope="col">{{ $unity->semester->classe->nameClass }}</td>
                                            <td scope="col">
                                                <a class="btn btn-warning" href="{{ route('unity.editU', $unity->id) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('unity.destroyU', $unity->id) }}"
                                                    role="button">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Nom UE</th>
                                        <th scope="col">Crédit</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Nom Classe</th>
                                        <th scope="col">Action</th>
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