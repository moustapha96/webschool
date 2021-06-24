@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des Rôles</h3>

@endsection
@section('option')
    @can('role-create')
        <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm" data-parent="#accordianId"
            href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
            <i class="fa fa-plus" aria-hidden="true"></i> ajouter un rôle
        </a>
    @endcan

@endsection
@section('option-panel')
    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">

            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                <div class="form-group">
                    <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                class="form-control @error('session') is-invalid @enderror" placeholder="name permission">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <div class="form-group">
                                @foreach ($permission as $value)
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input form-control" name="permission[]"
                                            id="permission" value="{{ $value->name }}"> {{ $value->name }}
                                    </label> <br>
                                @endforeach
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.role.show', $role->id) }}">Show</a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('admin.role.edit', $role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.role.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
