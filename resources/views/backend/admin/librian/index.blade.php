@extends('backend.layouts.main')


@section('styles')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-suitcase"></i> Gestion des utilisateurs</h1>
                <p>Liste des Bibliothécaires</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-success" href="{{ route('user.create') }}"><i
                            class="fa fa-plus"></i> Ajouter un utilisateur</a></li>
            </ul>
        </div>

        @if (session()->has('messageSuccess'))
            <div class="alert alert-success">
                {{ session()->get('messageSuccess') }}
            </div>
        @endif
        <div class="row">


            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <h2>Liste des Bibliothécaires</h2>
                        <hr width="30%" align="left">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">

                                <thead class="thead-dark">
                                    <tr>
                                        <th>Matrciule </th>
                                        <th>Prénoms</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Statut</th>
                                        <th align="right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($librians as $librian)
                                        <tr>
                                            <td>{{ $librian->matricule }} </td>
                                            {{-- <td><img src="@if (file_exists($librian->user->avatar)) {{asset($librian->user->avatar)}} @else {{  asset('uploads/avatars/default.png')}} @endif" 
                    style="width:40px; height:40px; border-radius:50%;"> </td> --}}
                                            <td>{{ $librian->user->prenom }}</td>
                                            <td>{{ $librian->user->nom }}</td>
                                            <td>{{ $librian->user->email }}</td>
                                            <td>
                                                @if ($librian->user->status == 1)
                                                    <span class="badge badge-success"> Compte activé </span>
                                                @else
                                                    <span class="badge badge-danger"> Compte désactivé </span>
                                                @endif
                                            </td>

                                            <td style="text-align: center">

                                                <span class="float-right">
                                                    <a href="{{ route('librian.show', $librian) }}"
                                                        class="btn btn-primary btn-sm" type="button">Voir</a>
                                                    <a href="{{ route('user.edit', $librian->user_id) }}"
                                                        class="btn btn-warning btn-sm" type="button">Modifier</a>
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

@endsection





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
                                    <h4 class="card-title">Liste des Etudiants</h4>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead class="thead-dark">
                                    <tr style="text-align: center;">
                                        <th>Matrciule </th>
                                        <th>Prénoms</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Statut</th>
                                        <th align="right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($librians as $librian)
                                        <tr>
                                            <td>{{ $librian->matricule }} </td>
                                            {{-- <td><img src="@if (file_exists($librian->user->avatar)) {{asset($librian->user->avatar)}} @else {{  asset('uploads/avatars/default.png')}} @endif" 
                    style="width:40px; height:40px; border-radius:50%;"> </td> --}}
                                            <td>{{ $librian->user->prenom }}</td>
                                            <td>{{ $librian->user->nom }}</td>
                                            <td>{{ $librian->user->email }}</td>
                                            <td>
                                                @if ($librian->user->status == 1)
                                                    <span class="badge badge-success"> Compte activé </span>
                                                @else
                                                    <span class="badge badge-danger"> Compte désactivé </span>
                                                @endif
                                            </td>

                                            <td style="text-align: center">

                                                <span class="float-right">
                                                    <a href="{{ route('librian.show', $librian) }}"
                                                        class="btn btn-primary btn-sm" type="button">Voir</a>
                                                    <a href="{{ route('user.edit', $librian->user_id) }}"
                                                        class="btn btn-warning btn-sm" type="button">Modifier</a>
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
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>


@endsection
