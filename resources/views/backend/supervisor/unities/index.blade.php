@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Liste des Classes </h1>
<p>Listes des classes</p>
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
                <th>Nom </th>
                <th>demande d'admission</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td>{{ $classe->id }}</td>
                    <td>{{ $classe->nameClass }}</td>
                    <td>
                        <a href="{{ url('/classes') }}" class="btn btn-success">liste</a>
                    </td>

                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nom </th>
                <th>demande d'admission</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

