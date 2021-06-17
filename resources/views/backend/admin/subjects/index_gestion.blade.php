@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-hourglass" aria-hidden="true"></i>Gestion des Matieres</h1>
    <h4 class="mt-2">Enregistrement des matieres , unités et semestres </h4>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-hover table-bordered" id="sampleTable" width="100%">
            <thead>
                <th>Gestion</th>
                <th>Option</th>
            </thead>
            <tbody>
                <tr>
                    <td>Semestres </td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.semester.create') }}" role="button">ajouter</a>
                        <a class="btn btn-dark" href="{{ route('admin.semester.index') }}" role="button">lister</a>
                    </td>
                </tr>
                <tr>
                    <td>Unités d'enseignement</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.unity.create') }}" role="button">ajouter</a>
                        <a class="btn btn-dark" href="{{ route('admin.unity.index') }}" role="button">lister</a>
                    </td>
                </tr>
                <tr>
                    <td>Matières</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.subject.create') }}" role="button">ajouter</a>
                        <a class="btn btn-dark" href="{{ route('admin.subject.index') }}" role="button">lister</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
