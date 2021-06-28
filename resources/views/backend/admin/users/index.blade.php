@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Tous les utilisateurs</h4>

@endsection
@section('option')
    <a href="{{ route('admin.user.create') }}" class="btn btn-info float-right btn-sm" role="button">
        <i class="fa fa-plus" aria-hidden="true"></i>Nouveau utilisateur</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th scope="col" style="width: 10%">Nom complet</th>
                    <th scope="col" style="width: 10%">Email</th>
                    <th scope="col" style="width: 10%">Role</th>
                    <th scope="col" style="width: 10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Le corps du tableau ici -->
                @foreach ($users as $user)
                    <tr>
                        <td scope="col" style="width: 10%">{{ ucwords($user->prenom . ' ' . $user->nom) }}</td>
                        <td scope="col" style="width: 10%">{{ $user->email }}</td>
                        <td scope="col" style="width: 10%">{{ get_user_role($user->role) }}</td>

                        <td scope="col" style="text-align: center; width: 10%">
                            <a class="btn btn-outline-warning" href="{{ route('user.edit', $user->id) }}" role="button">
                                <i class="fa fa-edit"></i></a>
                            {{-- <a class="btn btn-info" href="{{ route('user.show', $user->id) }}" role="button"> <i
                                    class="fa fa-eye" aria-hidden="true"></i> </a> --}}

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
