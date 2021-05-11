{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">

        <div class="app-title">
            <div>
                <h1><i class="fa fa-users"></i>Liste des classes</h1>
                <p> Liste des classes existant </p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>classe</th>
                                        <th>nom classe</th>
                                        <th>action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td>{{ $classe->id }}</td>
                                            <td>{{ $classe->nameClass }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('classe.list_etudiant', $classe) }}"
                                                    class="btn btn-dark" data-content="Show" data-placement="top"
                                                    data-trigger="hover" data-toggle="tooltip" data-placement="top"
                                                    title="afficher liste etudiants">
                                                    afficher liste etudiant
                                                </a>
                                                <a href="{{ route('classe.imprimer_bulletin', $classe) }}"
                                                    class="btn btn-info" data-content="Show" data-placement="top"
                                                    data-trigger="hover" data-toggle="tooltip" data-placement="top"
                                                    title="imprimer bulletin etudiants">
                                                    imprimer bulletin etudiants
                                                </a>

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
                                    <h1><i class="fa fa-users"></i>Liste des classes</h1>
                                    <p> Liste des classes existant </p>
                                </div>
                                <div class="col-md-6">


                                    <a href="{{ url()->previous() }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>

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
                                        <th>classe</th>
                                        <th>nom classe</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td>{{ $classe->id }}</td>
                                            <td>{{ $classe->nameClass }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ route('classe.list_etudiant', $classe) }}"
                                                    class="btn btn-dark" data-content="Show" data-placement="top"
                                                    data-trigger="hover" data-toggle="tooltip" data-placement="top"
                                                    title="afficher liste etudiants">
                                                    afficher liste etudiant
                                                </a>
                                                <a href="{{ route('classe.imprimer_bulletin', $classe) }}"
                                                    class="btn btn-info" data-content="Show" data-placement="top"
                                                    data-trigger="hover" data-toggle="tooltip" data-placement="top"
                                                    title="imprimer bulletin etudiants">
                                                    imprimer bulletin etudiants
                                                </a>

                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>classe</th>
                                        <th>nom classe</th>
                                        <th>action</th>
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
