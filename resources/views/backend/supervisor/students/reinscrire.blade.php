@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Liste des étudiants </h1>
<p>Liste des demande d'admission de la {{ $classe->nameClass }} </p>
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
                <th>INE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>lieu de naissance</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classe->student as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->ine }}</td>
                    <td>{{ $student->user->nom }}</td>
                    <td>{{ $student->user->prenom }}</td>
                    <td>{{ $student->user->dateNaissance }}</td>
                    <td>{{ $student->user->lieuNaissance }}</td>
                    <td>
                        <a href="{{ route('reinscription_student.accepter', $student->id) }}"
                            class="btn btn-primary">inscrire</a>
                        <a href="{{ url('/etudiantsRedoublants/create') }}"
                            class="btn btn-danger">Redouble</a>
                    </td>

                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>INE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>lieu de naissance</th>
                <th colspan="3">Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

