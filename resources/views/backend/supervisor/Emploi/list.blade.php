{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-calendar" aria-hidden="true"></i>Emploi du temps</h1>
                <h2 class="mt-2">Emploi du temps de la <u> {{ $code }} </u></h2>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <a class="btn btn-success" href="{{ route('emploi.create') }}" role="button">Créer</a>
                    <a class="btn btn-outline-info" href="{{ route('emploi.imprimer', $code) }}"
                        role="button">Imprimer</a>
                    <a class="btn btn-outline-dark" href="{{ route('emploi.list') }}" role="button">retour</a>
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
                                        <th scope="col">JOURS</th>
                                        <th scope="col">MATIERE</th>
                                        <th scope="col">PROFESSEUR</th>
                                        <th scope="col">SALLE</th>
                                        <th scope="col">DEBUT COURS</th>
                                        <th scope="col">FIN COURS</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classRoutines as $classRoutine)
                                        <tr>
                                            <td scope="col">{{ $classRoutine->day }}</td>
                                            <td scope="col">{{ $classRoutine->subject->name }}</td>
                                            <td scope="col">{{ $classRoutine->teacher->user->prenom }}
                                                {{ $classRoutine->teacher->user->nom }} </td>
                                            <td scope="col">{{ $classRoutine->classroom->description }} </td>
                                            <td scope="col">{{ $classRoutine->start_time }}</td>
                                            <td scope="col">{{ $classRoutine->end_time }}</td>

                                            <td scope="col">
                                                <a class="btn btn-primary"
                                                    href="{{ route('emploi.edit', $classRoutine->id) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('emploi.destroy', $classRoutine->id) }}"
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
                                    <h1><i class="fa fa-calendar" aria-hidden="true"></i>Emploi du temps</h1>
                                    <h2 class="mt-2">Emploi du temps de la <u> {{ $code }} </u></h2>

                                </div>
                                <div class="col-md-6">
                                    <li class="breadcrumb-item">
                                        <a class="btn btn-success float-right btn-sm" href="{{ route('emploi.create') }}"
                                            role="button">Créer</a>
                                        <a class="btn btn-success float-right btn-sm"
                                            href="{{ route('emploi.imprimer', $code) }}" role="button">Imprimer</a>
                                        <a class="btn btn-success float-right btn-sm" href="{{ route('emploi.list') }}"
                                            role="button">retour</a>
                                    </li>

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
                                    <tr style="text-align: center;">
                                        <th scope="col">JOURS</th>
                                        <th scope="col">MATIERE</th>
                                        <th scope="col">PROFESSEUR</th>
                                        <th scope="col">SALLE</th>
                                        <th scope="col">DEBUT COURS</th>
                                        <th scope="col">FIN COURS</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classRoutines as $classRoutine)
                                        <tr>
                                            <td scope="col">{{ $classRoutine->day }}</td>
                                            <td scope="col">{{ $classRoutine->subject->name }}</td>
                                            <td scope="col">{{ $classRoutine->teacher->user->prenom }}
                                                {{ $classRoutine->teacher->user->nom }} </td>
                                            <td scope="col">{{ $classRoutine->classroom->description }} </td>
                                            <td scope="col">{{ $classRoutine->start_time }}</td>
                                            <td scope="col">{{ $classRoutine->end_time }}</td>

                                            <td scope="col">
                                                <a class="btn btn-primary"
                                                    href="{{ route('emploi.edit', $classRoutine->id) }}"
                                                    role="button">Modifier</a>
                                                <a class="btn btn-danger"
                                                    href="{{ route('emploi.destroy', $classRoutine->id) }}"
                                                    role="button">Supprimer</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="text-align: center;">
                                        <th scope="col">JOURS</th>
                                        <th scope="col">MATIERE</th>
                                        <th scope="col">PROFESSEUR</th>
                                        <th scope="col">SALLE</th>
                                        <th scope="col">DEBUT COURS</th>
                                        <th scope="col">FIN COURS</th>
                                        <th scope="col">ACTIONS</th>
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
