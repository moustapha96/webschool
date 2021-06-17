@extends('backend.layouts.template')


@section('title')
<h4 class="card-title">Gestion des Parents</h4>

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
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Civilité</th>
                <th>étudiant</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parents as $parent)
                <tr>
                    <td> {{ $parent->student->user->prenom }}</td>
                    <td>{{ $parent->student->user->nom }}</td>
                    <td>{{ $parent->user->email }}</td>
                    <td>{{ $parent->user->genre }}</td>
                    <td>{{ $parent->student->count() }}</td>


                    <td class="hover">
                        <a href="{{ route('admin.parent.show', $parent) }}" class="btn btn-outline-link  hover">
                            <i class="fa fa-eye" aria-hidden="true"></i> </a>
                    </td>


                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Civilité</th>
                <th>étudiant</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
