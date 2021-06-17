@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-user"></i>Abscences</h1>
<p>Liste des abscences </p>

@endsection
@section('option')
<a class="btn btn-outline-primary float-right btn-sm"
href="{{ route('admin.student_attendance.create') }}">
<i class="fa fa-plus"></i> ajouter un absence</a></li>

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>

                <th>Student</th>
                <th>Classe</th>
                <th>Date</th>
                <th>attendance</th>
                <th>détail</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student_attendances as $student_attendance)
                <tr>

                    <td>{{ $student_attendance->student->ine }}</td>
                    <td>{{ $student_attendance->classe->niveau->code .' '.$student_attendance->classe->filiere->code }}</td>
                    <td>{{ $student_attendance->date }}</td>
                    <td>{{ $student_attendance->attendance }}</td>
                    <td><a href="{{ route('admin.student_attendance.edit', $student_attendance) }}"
                            class="btn btn-outline-primary"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                    <td>
                        <form
                            action="{{ route('admin.student_attendance.destroy', $student_attendance) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i> </button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>

                <th>Student</th>
                <th>Classe</th>
                <th>Date</th>
                <th>attendance</th>
                <th>détail</th>
                <th colspan="2">Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
