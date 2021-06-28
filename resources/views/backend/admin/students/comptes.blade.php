@extends('backend.layouts.template')


@section('title')
    <h1 class="card-title text-bold">Liste des étudiants </h1>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
   
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr style="text-align: center;">
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>compte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $stu)
                    <tr style="text-align: center;">
                        <td >{{ ucwords($stu->user->prenom . ' ' . $stu->user->nom) }}</td>
                        <td >{{ $stu->user->email }}</td>
                        <td >{{ $stu->user->adresse }}</td>
                        <td >
                            <form class="form-group" action="{{ route('admin.student.updateCompte', $stu->user) }}"
                                method="post">
                                @csrf
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input onchange="alert('statut changé ')" type="checkbox" name="status" id="status"
                                            {{ $stu->user->status == '1' ? 'checked' : '' }} autocomplete="off">
                                    </label>

                                </div>
                            </form>
                        </td>

                        <td scope="col" >
                            <a class="btn btn-link" href="{{ route('user.edit', $stu->user->id) }}" role="button">
                                <i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="text-align: center;">
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>compte</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
