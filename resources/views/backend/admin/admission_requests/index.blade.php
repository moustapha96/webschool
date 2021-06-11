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

                                    <h4 class="card-title"><i class="fa fa-file-o" aria-hidden="true"></i>Liste des Demandes
                                        Admissions </h4>
                                    <p>Liste des admissions</p>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ redirect()->back() }}" class="btn btn-outline-dark float-right btn-sm"
                                        role="button"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>
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
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">INE</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>

                                        <th scope="col">E-mail</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Dossier</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admission_requests as $admission_request)
                                        <tr>
                                            <td>{{ $admission_request->ine }}</td>
                                            <td>{{ $admission_request->prenom }}</td>
                                            <td>{{ $admission_request->nom }}</td>
                                            <td>{{ $admission_request->email }}</td>
                                            <td>{{ $admission_request->classe->niveau->name }} -- {{ $admission_request->classe->filiere->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.admission_requests.show', $admission_request) }}"
                                                    class="btn btn-outline-primary"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                            </td>
                                            <td>

                                                <a href="{{ route('admin.admission_requests.destroy', $admission_request) }}"
                                                    class="btn btn-outline-danger"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col">INE</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Nom</th>

                                        <th scope="col">E-mail</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Dossier</th>
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
