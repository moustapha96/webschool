@extends('backend.layouts.template')


@section('title')
<h4 class="card-title">Gestion des classes</h4>
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
                <th>Nom</th>
                <th>Code</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classe as $classes)
                <tr>
                    <td>{{ $classes->id }}</td>
                    <td><a href="#">{{ $classes->nameClass }}</a></td>
                    <td>{{ $classes->code }}</td>

                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Nom</th>
                <th>Liste des étudiants </th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

