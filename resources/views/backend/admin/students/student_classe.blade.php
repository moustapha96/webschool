@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Liste des étudiants</h1>
    <p>Liste des étudiants de la classe {{ $classe->niveau->code . ' ' . $classe->filiere->name }} </p>

@endsection
@section('option')
<a href="{{ route('admin.export.export_classe_excel',$classe) }}" class="btn btn-outline-primary btn-sm">
    <i class="fa fa-print" aria-hidden="true"></i> imprimer excel
</a>
<a href="{{ route('admin.export.export_classe_pdf',$classe) }}" class="btn btn-outline-primary btn-sm">
    <i class="fa fa-print" aria-hidden="true"></i> imprimer pdf
</a>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classe->student as $student)
                    <tr>

                        <td>{{ $student->ine }}</td>
                        <td>{{ $student->user->nom }}</td>
                        <td>{{ $student->user->prenom }}</td>
                        <td>{{ $student->user->dateNaissance }}</td>
                        <td>{{ $student->user->lieuNaissance }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Button group">

                                <a href="{{ route('admin.classes.show_student', $student) }}"
                                    class="btn btn-outline-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i> </a>
                            </div>
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
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
