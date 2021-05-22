{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-suitcase"></i>Gestion des Utilisateurs</h1>
                <p class="mt-2">Liste des Professeurs</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>

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
                        <h2>Liste des Professeurs</h2>
                        <hr width="30%" align="left">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Tel</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->matricule }}</td>
                                            <td>{{ $teacher->user->prenom }}</td>
                                            <td>{{ $teacher->user->nom }} </td>
                                            <td>{{ $teacher->user->tel }} </td>
                                            <td>{{ $teacher->user->adresse }}</td>
                                            <td>
                                                @if ($teacher->user->status == 1)
                                                    <span class="badge badge-success"> Compte activé </span>
                                                @else
                                                    <span class="badge badge-danger"> Compte désactivé </span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="float-right">
                                                    <a href="{{ route('teacher.show', $teacher) }}"
                                                        class="btn btn-primary btn-sm" type="button">Voir</a>
                                                    <a href="{{ route('teacher.classe_routine', $teacher) }}"
                                                        class="btn btn-warning btn-sm" type="button">
                                                        Emploi du temps
                                                    </a>
                                                </span>


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
                                    <h3><i class="fa fa-suitcase"></i>Gestion des Utilisateurs</h3>
                                    <p class="mt-2">Liste des Professeurs</p>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
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
                            <h2>Liste des Professeurs</h2>
                            <hr width="30%" align="left">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Tel</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">EMPLOI DU TEMPS</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->matricule }}</td>
                                            <td>{{ $teacher->user->prenom }}</td>
                                            <td>{{ $teacher->user->nom }} </td>
                                            <td>{{ $teacher->user->tel }} </td>
                                            <td>{{ $teacher->user->adresse }}</td>
                                            <td>
                                                @if ($teacher->user->status == 1)
                                                    <span class="badge badge-success"> Compte activé </span>
                                                @else
                                                    <span class="badge badge-danger"> Compte désactivé </span>
                                                @endif
                                            </td>
                                            <td>


                                                <a href="{{ route('teacher.classe_routine', $teacher) }}"
                                                    class="btn btn-outline-warning btn-sm" type="button">
                                                    <i class="fa fa-dashcube" aria-hidden="true">EMPL</i>
                                                </a>



                                            </td>
                                            <td>

                                                <a href="{{ route('teacher.show', $teacher) }}"
                                                    class="btn btn-outline-primary btn-sm" type="button">
                                                    <i class="fa fa-eye" aria-hidden="true"></i></a>




                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Matricule</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Tel</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Statut</th>
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
