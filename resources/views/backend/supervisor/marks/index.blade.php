@extends('backend.layouts.template')


@section('title')
    <h1 class="card-title">Gestion des Notes</h1>
@endsection
@section('option')
    <a href="{{ route('supervisor.marks.create') }}" class="btn btn-info float-right btn-sm" role="button">
        <i class="fa fa-plus" aria-hidden="true"></i> note</a>
@endsection
@section('option-panel')

@endsection
@section('data')


    {{-- second facons --}}




    @role('mark')
        <div class="responsive">
            <div class="float-left">
                <form class="form-inline" action="{{ route('supervisor.import.student_mark.store') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fiche" />
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <button style="margin-left: 10px;" class="btn btn-sm btn-info" type="submit"> <i class="fa fa-save"
                            aria-hidden="true"></i> Import</button>
                </form>
            </div>
            <div class="float-right">
                <form action="{{ route('supervisor.import.student_mark.fiche') }}" enctype="multipart/form-data">
                    <button class="btn btn-dark btn-sm" type="submit"> <i class="fa fa-print" aria-hidden="true"></i>
                        Export</button>
                </form>
            </div>
        </div>
    @endrole 
    <br />
    <br />
    <hr>
    <div class="responsive">
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
                            <td>{{ $mark->student->classe->filiere->name }} --
                                {{ $mark->student->classe->niveau->name }}
                            </td>
                            <td>{{ $mark->subject->name }}</td>
                            <td>{{ $mark->mark_value }}</td>
                            <td>{{ $mark->typeNote }}</td>

                            <td class="hover">
                                <a href="{{ route('supervisor.marks.edit', $mark) }}" class="btn btn-link  hover">
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
