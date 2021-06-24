@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des Rôles</h3>

@endsection
@section('option')

    <a class="btn btn-primary  float-right btn-sm" href="{{ route('admin.role.index') }}">
        <i class="fa fa-plus" aria-hidden="true"></i> ajouter un rôle
    </a>

@endsection
@section('option-panel')

@endsection
@section('data')
    {{-- <div class="card-block card-dashboard">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h2> <strong>Name:</strong>
                    {{ $role->name }}
                </h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <strong> Role </strong> : {{ $role->name }}</h5>
            <p class="card-text">
            <div class="form-group">
                <strong>Permissions: </strong>
                <div class="ml-5" >
                    @if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                            <br>
                        @endforeach
                    @endif
                </div>
            </div>
            </p>
        </div>
    </div>
@endsection
