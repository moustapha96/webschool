@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">Gestion des categories</h3>

@endsection
@section('option')
    <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm" data-parent="#accordianId"
        href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
        <i class="fa fa-plus" aria-hidden="true"></i> ajouter une catégorie
    </a>

@endsection
@section('option-panel')
<div id="accordianId" role="tablist" aria-multiselectable="true">
    <div class="card">

        <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <form action="{{ route('admin.categorie.add') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="session">Nom de la catégorie</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    class="form-control @error('session') is-invalid @enderror"
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
                <th>Catégorie</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }} </td>
                    <td>{{ $categorie->name }}</td>

                    <td style="text-align: center">

                        <div class="btn-group">

                            <a href="{{ route('admin.categorie.delete', $categorie) }}"
                                class="btn btn-outline-danger " data-toggle="tooltip"
                                data-placement="bottom" title="delete">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>

                            <a class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#contentId--{{ $categorie->id }}" aria-expanded="false"
                                aria-controls="contentId--{{ $categorie->id }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </div>


                    </td>
                    <div class="collapse" id="contentId--{{ $categorie->id }}">
                        <div class="card-title">

                            <h2 class="modal-title" id="exampleModalCenterTitle">Modifié une
                                catégorie </h2>
                            <hr>
                        </div>
                        <div class="form-group">
                            <form action="{{ route('admin.categorie.update', $categorie) }}"
                                method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="session">Nom de la catégorie</label>
                                    <input type="text" value="{{ $categorie->name }}"
                                        class="form-control" name="name" id="name"
                                        class="form-control @error('session') is-invalid @enderror"
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
                <th>Catégorie</th>
                <th>action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

