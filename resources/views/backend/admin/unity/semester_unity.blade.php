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
                                    <h3> Gestion des Classes</h3>
                                        <h5 class="mt-2">Liste des Unités d'enseignement : {{ $semestre->code }} de la
                                            {{ $semestre->classe->niveau->code . ' '.$semester->classe->filiere->code }}</h5>
                                </div>
                                <div class="col-md-6">


                                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark float-right btn-sm"
                                        role="button"> <i class="fa fa-reply" aria-hidden="true"></i> retour</a>

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
                                        <th scope="col">Nom UE </th>
                                        <th scope="col">Semestre </th>
                                        <th scope="col">classe </th>
                                        <th scope="col">Matiere </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semestre->unitie as $unite)
                                        <tr>
                                            <td scope="col">{{ $unite->code }}</td>
                                            <td scope="col">{{ $unite->name }}</td>
                                            <td scope="col">{{ $unite->semester->code }}</td>
                                            <td scope="col">{{ $unite->semester->classe->niveau->code . ' '.$unite->semester->classe->filiere->code }}</td>
                                            <td scope="col">
                                                @foreach ($unite->subject as $subject)
                                                    <table class="table table-striped">
                                                        <td>{{ $subject->name }}</td>
                                                    </table>
                                                @endforeach
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Nom UE </th>
                                        <th scope="col">Semestre </th>
                                        <th scope="col">classe </th>
                                        <th scope="col">Matiere </th>
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
