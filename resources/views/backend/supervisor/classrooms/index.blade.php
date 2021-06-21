@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Liste des Salles de classe</h4>
@endsection
@section('option')
    <a href="{{ route('admin.classrooms.create') }}" class="btn btn-info float-right btn-sm" role="button">Ajouter une
        salle de classe</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead class="thead-dark">
                <tr style="text-align: center;">
                    <th scope="col" style="width: 10%">Nom Salle</th>
                    <th scope="col" style="width: 10%">Description</th>
                    <th scope="col" style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Le corps du tableau ici -->
                @foreach ($classrooms as $classroom)
                    <tr>
                        <td scope="col" style="width: 10%">{{ $classroom->name }}</td>
                        <td scope="col" style="width: 10%">{{ $classroom->description }}</td>
                        <td scope="col" style="text-align: center; width: 10%">
                            <a class="btn btn-warning" href="{{ route('admin.classrooms.edit', $classroom->id) }}"
                                role="button"> Modifier</a>
                            <a class="btn btn-danger" href="{{ route('admin.classrooms.delete', $classroom->id) }}"
                                role="button"> Supprimer</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
