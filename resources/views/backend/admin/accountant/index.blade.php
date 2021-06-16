@extends('backend.layouts.template')


@section('title')
<h1 class="m-0">Liste des Comptables</h1>

@endsection
@section('option')
<a class="btn btn-info float-right btn-sm" href="{{ route('user.create') }}">
    <i class="fa fa-plus" aria-hidden="true"></i> Nouevau Comptable
</a>

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
            @foreach ($accountants as $accountant)
                <tr>
                    <td>{{ $accountant->matricule }} </td>
                    <td>{{ $accountant->user->prenom }}</td>
                    <td>{{ $accountant->user->nom }}</td>
                    <td>{{ $accountant->user->email }}</td>
                    <td>
                        @if ($accountant->user->status == 1)
                            <span class="badge badge-success"> Compte activé </span>
                        @else
                            <span class="badge badge-danger"> Compte désactivé </span>
                        @endif
                    </td>

                    <td style="text-align: center">

                        <span class="float-right">
                            <a href="{{ route('accountant.show', $accountant) }}"
                                class="btn btn-outline-primary btn-sm" type="button">  <i class="fa fa-eye" aria-hidden="true"></i> </a>
                            <a href="{{ route('user.edit', $accountant->user_id) }}"
                                class="btn btn-outline-warning btn-sm" type="button"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                        </span>



                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
              <th>Matrciule </th>
              <th>Prénoms</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Statut</th>
              <th align="right">Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

