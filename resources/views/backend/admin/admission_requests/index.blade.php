@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title "><i class="fa fa-file-o" aria-hidden="true"></i>Liste des Demandes
        Admissions </h4>

@endsection
@section('option')

@endsection
@section('data')
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
                        <td>{{ $admission_request->classe->niveau->name }} --
                            {{ $admission_request->classe->filiere->name }}</td>
                        <td>
                            <a href="{{ route('admin.admission_requests.show', $admission_request) }}"
                                class="btn btn-outline-primary"> <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
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
@endsection
