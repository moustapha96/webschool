@extends('backend.layouts.template')


@section('title')
    <h3><i class="fa fa-suitcase"></i>Gestion des Utilisateurs</h3>
    <p class="mt-2">Liste des Professeurs</p>

@endsection
@section('option')
<a class="btn btn-primary float-right btn-sm" href="{{ route('admin.teacher.role') }}" role="button"> <i class="fa fa-user" aria-hidden="true"></i> Gestion des rôles</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <h2>Liste des Professeurs</h2>
        <hr width="30%" align="left">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Statut</th>
                    <th scope="col">EMPLOI DU TEMPS</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->matricule }}</td>
                        <td>{{ $teacher->user->prenom }}</td>
                        <td>{{ $teacher->user->nom }} </td>
                        <td>{{ $teacher->user->tel }} </td>
                        <td>{{ $teacher->user->adresse }}</td>
                        <td>
                            @if ($teacher->user->status == 1)
                                <span class="badge badge-success"> Compte activé </span>
                            @else
                                <span class="badge badge-danger"> Compte désactivé </span>
                            @endif
                        </td>
                        <td>


                            <a href="{{ route('teacher.classe_routine', $teacher) }}"
                                class="btn btn-outline-warning btn-sm" type="button">
                                <i class="fa fa-dashcube" aria-hidden="true">EMPL</i>
                            </a>



                        </td>
                        <td>

                            <a href="{{ route('teacher.show', $teacher) }}" class="btn btn-outline-primary btn-sm"
                                type="button">
                                <i class="fa fa-eye" aria-hidden="true"></i></a>




                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
