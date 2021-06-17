@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Liste des étudiants</h4>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>compte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Le corps du tableau ici -->
                @foreach ($students as $stu)
                    <tr>
                        <td>{{ ucwords($stu->user->prenom . ' ' . $stu->user->nom) }}</td>
                        <td>{{ $stu->user->email }}</td>

                        <td>
                            <form class="form-group" action="{{ route('admin.student.updateCompte', $stu->user) }}"
                                method="post">
                                @csrf
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input onchange="alert('coucou ')" type="checkbox" name="status" id="status"
                                            {{ $stu->user->status == '1' ? 'checked' : '' }} autocomplete="off">
                                    </label>

                                </div>
                            </form>
                        </td>

                        <td scope="col" style="text-align: center; width: 10%">


                            <a class="btn btn-warning" href="{{ route('user.edit', $stu->user->id) }}" role="button"> <i
                                    class="fa fa-edit"></i></a>


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection


