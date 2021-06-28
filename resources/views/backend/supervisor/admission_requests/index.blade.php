@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-file-o" aria-hidden="true"></i>Liste des Demandes Admissions </h1>
    <p>Liste des admissions</p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">



                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                        <tr>
                            <th scope="col">INE</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Dossier</th>
                            <th scope="col">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admission_requests as $admission_request)
                            <tr>
                                <td>{{ $admission_request->ine }}</td>
                                <td>{{ $admission_request->prenom }}</td>
                                <td>{{ $admission_request->nom }}</td>
                                <td>{{ $admission_request->email }}</td>
                                <td>{{ $admission_request->classe->niveau->code . ' ' . $admission_request->classe->filiere->code }}
                                </td>
                                <td>
                                    <a href="{{ route('admission_requests.detail', $admission_request->id) }}"
                                        class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    @can('valider-admission')
                                        @if ($admission_request->status == 0)
                                            <a href="{{ route('admission_request.valider', $admission_request->id) }}"
                                                class="btn btn-outline-info"><i class="fas fa-save" aria-hidden="true"></i> </a>

                                        @endif
                                    @endcan
                                    <a href="{{ route('admission_requests.destroy', $admission_request->id) }}"
                                        class="btn btn-outline-danger"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <tr>
                            <th scope="col">INE</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Dossier</th>
                            <th scope="col">Action</th>
                        </tr>
                        </tr>
                    </tfoot>
                </table>






            </div>
        </div>
    </div>
@endsection
