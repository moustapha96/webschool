{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil" aria-hidden="true"></i> Réclamations</h1>
                <p>Liste des réclamations</p>
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
                        <div class="table-responsive">



                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead class="thead-dark">
                                    <tr>

                                        <th scope="col">INE</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Motif</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reclaetudiants as $reclaetudiant)
                                        <tr>
                                            <td>{{ $reclaetudiant->student->ine }}</td>
                                            <td>{{ $reclaetudiant->student->user->prenom }}</td>
                                            <td>{{ $reclaetudiant->student->user->nom }}</td>
                                            <td>{{ $reclaetudiant->student->classe->nameClass }}</td>
                                            <td>{{ $reclaetudiant->reclamation->dateRecla }}</td>
                                            <td>{{ $reclaetudiant->reclamation->commentaire }}</td>
                                            <td>
                                             
                                                <a href="{{ route('reclaetudiants.destroy', $reclaetudiant->id) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> </a>

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
                                    <h1><i class="fa fa-pencil" aria-hidden="true"></i> Réclamations</h1>
                                    <p>Liste des réclamations</p>
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
                                        <th scope="col">INE</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Motif</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reclaetudiants as $reclaetudiant)
                                        <tr>
                                            <td>{{ $reclaetudiant->student->ine }}</td>
                                            <td>{{ $reclaetudiant->student->user->prenom }}</td>
                                            <td>{{ $reclaetudiant->student->user->nom }}</td>
                                            <td>{{ $reclaetudiant->student->classe->nameClass }}</td>
                                            <td>{{ $reclaetudiant->reclamation->dateRecla }}</td>
                                            <td>{{ $reclaetudiant->reclamation->commentaire }}</td>
                                            <td>
                                               
                                                <a href="{{ route('reclaetudiants.destroy', $reclaetudiant->id) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">INE</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Motif</th>
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
