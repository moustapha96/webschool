@extends('backend.layouts.template')


@section('title')
<h4 class="card-title">Gestion des Notes</h4>

@endsection
@section('option')
<a href="{{ route('marks.create') }}" class="btn btn-info float-right btn-sm"
role="button">Ajouter une note</a>

@endsection
@section('option-panel')

@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>
                <th>étudiant</th>
                <th>email</th>
                <th>classe</th>
                <th>matiere</th>
                <th>note</th>
                <th>type</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td> {{ $mark->student->user->prenom . ' ' . $mark->student->user->nom }}</td>
                    <td>{{ $mark->student->user->email }}</td>
                    <td>{{ $mark->student->classe->filiere->name }} -- {{ $mark->student->classe->niveau->name }} </td>
                    <td>{{ $mark->subject->name }}</td>
                    <td>{{ $mark->mark_value }}</td>
                    <td>{{ $mark->typeNote }}</td>

                    <td class="hover">
                        <a href="{{ route('marks.edit', $mark) }}" class="btn btn-link  hover">
                            <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                    </td>


                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>étudiant</th>
                <th>email</th>
                <th>classe</th>
                <th>matiere</th>
                <th>note</th>
                <th>type</th>
                <th>action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

