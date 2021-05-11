@extends('backend.layouts.main')


@section('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection


@section('main')

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Gestion des categories</h4>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-outline-primary  float-right btn-sm" data-toggle="modal" data-target="#modalCategorie"
                                        role="button"><i class="fa fa-plus" aria-hidden="true"></i> ajouter une catégorie</a>

                                </div>
                            </div>
                           
                            
                            <hr>
                        </div>
                        
                    </div>
                    {{-- modal  ajouter une année académique --}}
                    <div class="modal fade" id="modalCategorie" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une catégorie de
                                    livre</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                {{-- fin modal --}}
                    <div class="card-body collapse show">
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

                                                    <a href="" class="btn btn-danger btn-sm" type="button">delete</a>

                                                </div>


                                            </td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>

@endsection
