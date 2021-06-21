@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-meetup" aria-hidden="true"></i>
    Salle de Classe</h1>
<p>Liste des salles de classes</p>
@endsection
@section('option')
<a href="{{ route('classroom.create') }}" class="btn btn-success float-right btn-sm"
role="button"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter</a>

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th scope="col" style="width: 10%">Nom Salle</th>
                <th scope="col" style="width: 10%">Description</th>
                <th scope="col" style="width: 10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataC as $classroom)
                <tr>
                    <td scope="col" style="width: 10%">{{ $classroom->name }}</td>
                    <td scope="col" style="width: 10%">{{ $classroom->description }}</td>
                    <td scope="col" style="text-align: center; width: 10%">
                        <a class="btn btn-warning"
                            href="{{ route('classroom.edit', $classroom->id) }}" role="button">
                            Modifier</a>
                        <a class="btn btn-danger"
                            href="{{ route('classroom.delete', $classroom->id) }}" role="button">
                            Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th scope="col" style="width: 10%">Nom Salle</th>
                <th scope="col" style="width: 10%">Description</th>
                <th scope="col" style="width: 10%">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

