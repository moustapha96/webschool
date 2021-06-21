@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Les Utilisateurs</h1>
<p class="mt-2">Liste des utilisateurs </p>
@endsection
@section('option')
<a class="btn btn-success float-right btn-sm" role="button">Ajouter </a>
@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">Nom complet</th>
                <th scope="col" style="width: 10%">Email</th>
                <th scope="col" style="width: 10%">Role</th>
                <th scope="col" style="width: 10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="col" style="width: 10%">
                        {{ ucwords($user->prenom . ' ' . $user->nom) }}</td>
                    <td scope="col" style="width: 10%">{{ $user->email }}</td>
                    <td scope="col" style="width: 10%">{{ get_user_role($user->role) }}</td>

                    <td scope="col" style="text-align: center; width: 10%">
                        <a class="btn btn-warning"
                            href="{{ route('admin.users.edit', $user->id) }}" role="button"> <i
                                class="fa fa-edit"></i></a>
                        <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}"
                            role="button"> Voir</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th scope="col" style="width: 10%">Nom complet</th>
                <th scope="col" style="width: 10%">Email</th>
                <th scope="col" style="width: 10%">Role</th>
                <th scope="col" style="width: 10%">Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection


