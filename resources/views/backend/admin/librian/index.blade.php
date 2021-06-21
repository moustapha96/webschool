@extends('backend.layouts.template')


@section('title')
    <h3>Liste des Bibliothécaires</h3>
@endsection
@section('option')
    <a class="btn btn-outline-success btn-sm" href="{{ route('user.create') }}"><i class="fa fa-plus"></i> Ajouter un
        utilisateur</a>
@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead class="thead-dark">
            <tr style="text-align: center;">
                <th>Matrciule </th>
                <th>Prénoms</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Statut</th>
                <th align="right">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($librians as $librian)
                <tr>
                    <td>{{ $librian->matricule }} </td>

                    <td>{{ $librian->user->prenom }}</td>
                    <td>{{ $librian->user->nom }}</td>
                    <td>{{ $librian->user->email }}</td>
                    <td>
                        @if ($librian->user->status == 1)
                            <span class="badge badge-success"> Compte activé </span>
                        @else
                            <span class="badge badge-danger"> Compte désactivé </span>
                        @endif
                    </td>

                    <td style="text-align: center">

                        <span class="float-right">
                            <a href="{{ route('librian.show', $librian) }}"
                                class="btn btn-primary btn-sm" type="button">Voir</a>
                            <a href="{{ route('user.edit', $librian->user_id) }}"
                                class="btn btn-warning btn-sm" type="button">Modifier</a>
                        </span>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection

