@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Modifier un Rôle</h3>

@endsection
@section('option')
    <a class="btn btn-primary  float-right btn-sm" href="{{ route('admin.role.index') }}">
        <i class="fa fa-plus" aria-hidden="true"></i> ajouter un rôle
    </a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <div class="form-group">
            <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        class="form-control @error('session') is-invalid @enderror" value="{{ $role->name }}"
                        placeholder="name permission">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check">
                    <div class="form-group">
                        @foreach ($permission as $value)
                            <label>
                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                {{ $value->name }}</label>
                            <br />
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">enregistrer</button>
                </div>
            </form>
        </div>

    </div>
@endsection
