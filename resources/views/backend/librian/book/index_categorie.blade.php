@extends('backend.layouts.template')


@section('title')
<h1><i class="fa fa-suitcase"></i>Catégorie</h1>
<p>Liste des Catégories </p>

@endsection
@section('option')
<a  class="btn btn-outline-warning"   data-toggle="modal" data-target="#modalCategorie" role="button" >ajouter une catégorie</a>

@endsection
@section('option-panel')
 {{-- modal  ajouter une année académique--}}
 <div class="modal fade" id="modalCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une catégorie de livre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <form action="{{ route('librian.categorie.add') }}" method="post">
                @csrf

                  <div class="form-group">
                    <label for="session">Nom de la catégorie</label>
                    <input type="text"
                      class="form-control" name="name" id="name"
                              class="form-control @error('session') is-invalid @enderror" placeholder="nom de la catégorie">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="modal-footer">
                    <button type="submit"  class="btn btn-success">enregistrer</button>
                  </div>
              </form>
            </div>
        </div>

      </div>
    </div>
  </div>
{{-- fin modal --}}
@endsection
@section('data')
<div class="tile">
    <div class="tile-body">
      <div class="table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable" width="100%">
          <thead>
            <tr>
              <th>Id</th>
              <th>name</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Le corps du tableau ici -->
            @foreach($categories as $categorie)
                <tr>
                  <td>{{ $categorie->id }}</td>
                  <td>{{ $categorie->name }}</td>
                  <td style="text-align: center">

                    <div class="btn-group">

                            <a  class="btn btn-outline-warning"
                            data-toggle="modal" data-target="#modalCategorie_edit-{{ $categorie->id }}"
                            data-toggle="tooltip" data-placement="bottom"
                            title="editer" >
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('librian.categorie.delete',$categorie) }}" class="btn btn-outline-danger "
                                data-toggle="tooltip" data-placement="bottom" title="delete">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>

                    </div>


                    </td>
                  </tr>
                     {{-- modal  modification categorie--}}
                      <div class="modal fade" id="modalCategorie_edit-{{ $categorie->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Modifié une catégorie </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <form action="{{ route('librian.categorie.update',$categorie) }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="session">Nom de la catégorie</label>
                                        <input type="text" value="{{ $categorie->name }}"
                                        class="form-control" name="name" id="name"
                                                class="form-control @error('session') is-invalid @enderror" placeholder="nom de la catégorie">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit"  class="btn btn-success">enregistrer</button>
                                    </div>
                                </form>
                                </div>
                            </div>

                        </div>
                        </div>
                            </div>
                    {{-- fin modal --}}
            @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection

