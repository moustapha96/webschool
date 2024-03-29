@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-users"></i>Classe : {{ $classe->niveau->code . ' ' . $classe->filiere->name }}</h1>
    <br>
    <p>Liste des étudiants </p>
@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th>prenom</th>
                    <th>nom</th>
                    <th>email</th>
                    <th>classe</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classe->student as $student)
                    <tr>
                        <td>{{ $student->user->prenom }}</td>
                        <td>{{ $student->user->nom }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->classe->niveau->code . ' ' . $student->classe->filiere->code }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('supervisor.marks', $student) }}" class="btn btn-outline-info"
                                data-content="Show" data-placement="top" data-trigger="hover" data-toggle="tooltip"
                                data-placement="top" title="afficher nptes etudiants">
                                <i class="fa fa-eye" aria-hidden="true"></i> notes
                            </a>

                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>prenom</th>
                    <th>nom</th>
                    <th>email</th>
                    <th>classe</th>
                    <th>action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
