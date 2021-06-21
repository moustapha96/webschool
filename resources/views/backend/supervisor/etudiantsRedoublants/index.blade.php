@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i>Liste des rédoublants </h1>
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
                    <th>Id</th>
                    <th>INE</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiantsRedoublant as $etudiantsRedoublants)
                    <tr>
                        <td>{{ $etudiantsRedoublants->id }}</td>
                        <td>{{ $etudiantsRedoublants->idStudent }}</td>

                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>INE</th>
                    <th colspan="2">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
