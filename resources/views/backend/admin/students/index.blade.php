@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Liste des Etudiants</h4>

@endsection
@section('option')

    <a href="{{ route('admin.export.export_student_excel') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fa fa-print" aria-hidden="true"></i> excel
    </a>
    <a href="{{ route('admin.export.export_student_pdf') }}" class="btn btn-outline-secondary btn-sm">
        <i class="fa fa-print fa-pdf" aria-hidden="true"></i> pdf
    </a>

@endsection
@section('option-panel')

@endsection
@section('data')


    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
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
                @foreach ($students as $student)
                    <tr style="text-align: center;">
                        <td>{{ $student->ine }}</td>
                        <td>{{ $student->user->nom }}</td>
                        <td>{{ $student->user->prenom }}</td>
                        <td>{{ $student->user->dateNaissance }}</td>
                        <td>{{ $student->user->lieuNaissance }}</td>
                        <td>
                            <a href="{{ route('admin.classes.show_student', $student) }}" class="btn btn-sm btn-outline-primary"><i
                                    class="fa fa-eye" aria-hidden="true"></i> </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr style="text-align: center;">
                    <th>INE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de naissance</th>
                    <th>lieu de naissance</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection
