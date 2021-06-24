@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des permission</h3>

@endsection
@section('option')

    <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm" data-parent="#accordianId"
        href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
        <i class="fa fa-plus" aria-hidden="true"></i> ajouter une permission
    </a>

@endsection
@section('option-panel')
    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">

            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                <div class="card-body">
                    <div>
                        <div class="form-group">
                            <form action="{{ route('admin.permission.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="nom permission">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="guard_name">guard_name</label>
                                    <input type="text" class="form-control" name="guard_name" id="guard_name"
                                        class="form-control @error('guard_name') is-invalid @enderror"
                                        placeholder="guard_name">
                                    @error('guard_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">enregistrer</button>
                                </div>
                            </form>
                        </div>
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
                    <th>Id</th>
                    <th>name</th>
                    <th>guard_name</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permission as $p)
                    <tr>
                        <td>{{ $p->id }} </td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->guard_name }}</td>

                        <td style="text-align: center">

                            <div class="btn-group">

                                <a href="{{ route('admin.permission.destroy', $p->id) }}" class="btn btn-outline-danger "
                                    data-toggle="tooltip" data-placement="bottom" title="delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>

                                <a class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#contentId--{{ $p->id }}" aria-expanded="false"
                                    aria-controls="contentId--{{ $p->id }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </div>


                        </td>
                        <div class="collapse" id="contentId--{{ $p->id }}">
                            <div class="card-title">

                                <h2 class="modal-title" id="exampleModalCenterTitle">Modifié le filiere
                                </h2>
                                <hr>
                            </div>
                            <div class="form-group">
                                <form action="{{ route('admin.permission.update', $p->id) }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" value="{{ $p->name }}" class="form-control" name="name"
                                            id="name" class="form-control @error('session') is-invalid @enderror"
                                            placeholder="nom permission">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="guard_name">guard_name</label>
                                        <input type="text" value="{{ $p->guard_name }}" class="form-control"
                                            name="guard_name" id="guard_name"
                                            class="form-control @error('guard_name') is-invalid @enderror"
                                            placeholder="guard_name">
                                        @error('guard_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </tr>



                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>guard_name</th>
                    <th>action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
