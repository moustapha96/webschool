@extends('backend.layouts.template')


@section('title')
<h4 class="card-title">Liste des Salles de classe</h4>

@endsection
@section('option')
<a href="{{ route('admin.classrooms.create') }}" class="btn btn-info float-right btn-sm" role="button" >Ajouter une salle de classe</a>

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead class="thead-dark">
          <tr style="text-align: center;">
            <th  >Nom Salle</th>
            <th  >Description</th>
            <th  >Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Le corps du tableau ici -->
          @foreach($classrooms as $classroom)
          <tr>
            <td >{{ $classroom->name }}</td>
            <td >{{ $classroom->description }}</td>
            <td  style="text-align: center; width: 10%">
            <a class="btn btn-warning" href="{{route('admin.classrooms.edit',$classroom->id) }}" role="button">
                <i class="fas fa-try" aria-hidden="true"></i>
            </a>
            <a class="btn btn-danger" href="{{route('admin.classrooms.delete',$classroom->id) }}" role="button">
                <i class="fas fa-trash" aria-hidden="true"></i>
            </a>
            </td>
          </tr>
          @endforeach

        </tbody>

      </table>
</div>
@endsection
