@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Liste des rédoublants </h1>
    <p>étudiants rédoublés</p>
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
                    <th>prenom</th>
                    <th>nom</th>
                    <th>classe</th>
                    <th>année academique</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($redoublants as $redoublant)
                    <tr>
                        <td>{{ $redoublant->id }}</td>
                        <td>{{ $redoublant->student->ine }}</td>
                        <td>{{ $redoublant->student->user->prenom }}</td>
                        <td>{{ $redoublant->student->user->nom }}</td>
                        <td>{{ $redoublant->classe->nameClass }}</td>
                        <td>{{ $redoublant->academic_year->year }}</td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>INE</th>
                    <th>prenom</th>
                    <th>nom</th>
                    <th>classe</th>
                    <th>année academique</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
