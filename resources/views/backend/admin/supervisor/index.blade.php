@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Liste des Classes</h4>

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
                    <th>Matrciule </th>
                    <th>Prénoms</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th align="right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supervisors as $supervisor)
                    <tr>
                        <td>{{ $supervisor->matricule }} </td>

                        <td>{{ $supervisor->user->prenom }}</td>
                        <td>{{ $supervisor->user->nom }}</td>
                        <td>{{ $supervisor->user->email }}</td>
                        <td>
                            @if ($supervisor->user->status == 1)
                                <span class="badge badge-success"> Compte activé </span>
                            @else
                                <span class="badge badge-danger"> Compte désactivé </span>
                            @endif
                        </td>

                        <td style="text-align: center">

                            <span class="float-right">
                                <a href="{{ route('supervisor.show', $supervisor) }}" class="btn btn-primary btn-sm"
                                    type="button">Voir</a>
                                <a href="{{ route('user.edit', $supervisor->user_id) }}" class="btn btn-warning btn-sm"
                                    type="button">Modifier</a>
                            </span>



                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Code</th>
                    <th>Salle</th>
                    <th>Eff.</th>
                    <th>Semestre</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
