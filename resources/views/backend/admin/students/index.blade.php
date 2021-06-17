@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Liste des Etudiants</h4>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th>INE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de naissance</th>
                    <th>lieu de naissance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Le corps du tableau ici -->
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->ine }}</td>
                        <td>{{ $student->user->nom }}</td>
                        <td>{{ $student->user->prenom }}</td>
                        <td>{{ $student->user->dateNaissance }}</td>
                        <td>{{ $student->user->lieuNaissance }}</td>
                        <td>
                            <a href="{{ route('admin.classes.show_student', $student) }}"
                                class="btn btn-primary">détail</a>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection
