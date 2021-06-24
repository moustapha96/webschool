@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des Rôles</h3>
    <br>
    <p> <strong> Atttribution des rôles </strong> </p>
@endsection
@section('option')
    @can('role-create')
        <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm" data-parent="#accordianId"
            href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
            <i class="fa fa-plus" aria-hidden="true"></i> attribuez
        </a>
    @endcan

@endsection
@section('option-panel')
    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="tile p-4 ">
                <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                    <div class="form-group">
                        <form action="{{ route('admin.role.attribution.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="user">utilisateur : </label>
                                <select id="user" class="form-control" name="user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->prenom . ' ' . $user->nom }} --
                                            {{ $user->role }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check">
                                <legend>rôles :</legend>
                                <div class="form-group">
                                    @foreach ($roles as $value)
                                        <label class="form-check-custom form-check-label">
                                            <input type="checkbox" class="form-check-input form-control" name="role[]"
                                                id="role" value="{{ $value->name }}"> {{ $value->name }}
                                        </label> <br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success">enregistrer</button>
                            </div>
                        </form>
                    </div>
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
                    <th>prenom </th>
                    <th>nom </th>
                    <th>email</th>
                    <th>statut </th>
                    <th>role </th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                 
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }} </td>
                        <td>

                            <div id="code" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="section1HeaderId">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-parent="#code"
                                                href="#section1ContentId-{{ $user->id }}" aria-expanded="true"
                                                aria-controls="section1ContentId-{{ $user->id }}">
                                                rôles
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="section1ContentId-{{ $user->id }}" class="collapse in" role="tabpanel"
                                        aria-labelledby="section1HeaderId-{{ $user->id }}">
                                        <div class="card-body">
                                            @foreach ($user->roles as $role)

                                                {{ $role->name }} <br>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>



                        </td>
                        <td>
                            @can('role-edit')
                                <a class="btn btn-primary"
                                    href="{{ route('admin.role.attribution.edit', $user->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.role.attribution.destroy', $user->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                        </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>prenom </th>
                    <th>nom </th>
                    <th>email</th>
                    <th>statut </th>
                    <th>role </th>
                    <th width="280px">Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
