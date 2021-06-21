@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-user"></i>Abscences</h1>
    <p>Liste des abscences </p>
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
                    <th>Id</th>
                    <th>Student</th>
                    <th>Classe</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student_attendances as $student_attendance)
                    <tr>
                        <td>{{ $student_attendance->id }}</td>
                        <td>{{ $student_attendance->students->ine }}</td>
                        <td>{{ $student_attendance->classes->nameClass }}</td>
                        <td>{{ $student_attendance->date }}</td>
                        <td>{{ $student_attendance->commentaire }}</td>
                        <td><a href="{{ route('student_attendance.edit', $student_attendance->id) }}"
                                class="btn btn-primary">Edit</a>
                        <td>
                            <form action="{{ route('student_attendances.destroy', $student_attendance->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Student</th>
                    <th>Classe</th>
                    <th>Date</th>
                    <th>Commentaires</th>
                    <th colspan="2">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
