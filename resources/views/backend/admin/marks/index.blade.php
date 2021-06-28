@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des Notes</h3>

@endsection
@section('option')
    <a href="{{ route('marks.create') }}" class="btn btn-outline-success float-right btn-sm" role="button"><i
            class="fa fa-plus" aria-hidden="true"></i>ajouter</a>
@endsection
@section('option-panel')

@endsection
@section('data')


    <div class="container">


        <div class="responsive">
            <div class="float-left">
                <form class="form-inline" action="{{ route('admin.import.student_mark.store') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fiche" />
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <button style="margin-left: 10px;" class="btn btn-info" type="submit">Import</button>
                </form>
            </div>
            <div class="float-right">
                <form action="{{ route('admin.import.student_mark.fiche') }}" enctype="multipart/form-data">
                    <button class="btn btn-dark" type="submit">Export</button>
                </form>
            </div>
        </div>
        <br />

        <div class="table-responsive">

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
                            <td>{{ $mark->student->classe->filiere->name }} --
                                {{ $mark->student->classe->niveau->name }}
                            </td>
                            <td>{{ $mark->subject->name }}</td>
                            <td>{{ $mark->mark_value }}</td>
                            <td>{{ $mark->typeNote }}</td>

                            <td class="hover">
                                <a href="{{ route('marks.edit', $mark) }}" class="btn btn-link  hover">
                                    <i class="fa fa-edit" aria-hidden="true"></i> </a>
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

    </div>
@endsection
