@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des niveaux</h3>

@endsection
@section('option')

    <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm" data-parent="#accordianId"
        href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
        <i class="fa fa-plus" aria-hidden="true"></i> ajouter un niveau
    </a>

@endsection
@section('option-panel')
    <div id="accordianId" role="tablist" aria-multiselectable="true">
        <div class="card">

            <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
                <div class="card-body">
                    <div>
                        <div class="form-group">
                            <form action="{{ route('admin.niveau.add') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="session">Code</label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        class="form-control @error('session') is-invalid @enderror" placeholder="code">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="session">Niveau</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        class="form-control @error('session') is-invalid @enderror" placeholder="nom ">
                                    @error('name')
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
                    <th>code</th>
                    <th>name</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($niveaux as $niveau)
                    <tr>
                        <td>{{ $niveau->id }} </td>
                        <td>{{ $niveau->code }}</td>
                        <td>{{ $niveau->name }}</td>

                        <td style="text-align: center">

                            <div class="btn-group">

                                <a href="{{ route('admin.niveau.delete', $niveau) }}" class="btn btn-outline-danger "
                                    data-toggle="tooltip" data-placement="bottom" title="delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>

                                <a class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#contentId--{{ $niveau->id }}" aria-expanded="false"
                                    aria-controls="contentId--{{ $niveau->id }}">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </div>


                        </td>
                        <div class="collapse" id="contentId--{{ $niveau->id }}">
                            <div class="card-title">

                                <h2 class="modal-title" id="exampleModalCenterTitle">Modifié le niveau
                                </h2>
                                <hr>
                            </div>
                            <div class="form-group">
                                <form action="{{ route('admin.niveau.update', $niveau) }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="session">code</label>
                                        <input type="text" value="{{ $niveau->code }}" class="form-control" name="code"
                                            id="code" class="form-control @error('session') is-invalid @enderror"
                                            placeholder="code niveau">
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="session">Niveau</label>
                                        <input type="text" value="{{ $niveau->name }}" class="form-control" name="name"
                                            id="name" class="form-control @error('session') is-invalid @enderror"
                                            placeholder="nom de la catégorie">
                                        @error('name')
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
                    <th>code</th>
                    <th>name</th>
                    <th>action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
