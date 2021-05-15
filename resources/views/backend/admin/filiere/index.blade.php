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
                                    <h4 class="card-title">Gestion des filieres</h4>
                                </div>
                                <div class="col-md-6">

                                    <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm"
                                        data-parent="#accordianId" href="#section1ContentId" aria-expanded="true"
                                        aria-controls="section1ContentId">
                                        <i class="fa fa-plus" aria-hidden="true"></i> ajouter une Filiere
                                    </a>

                                </div>
                            </div>
                            <div id="accordianId" role="tablist" aria-multiselectable="true">
                                <div class="card">

                                    <div id="section1ContentId" class="collapse in" role="tabpanel"
                                        aria-labelledby="section1HeaderId">
                                        <div class="card-body">
                                            <div>
                                                <div class="form-group">
                                                    <form action="{{ route('admin.filiere.add') }}" method="post">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="session">Code</label>
                                                            <input type="text" class="form-control" name="code" id="code"
                                                                class="form-control @error('session') is-invalid @enderror"
                                                                placeholder="code filiere">
                                                            @error('code')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="session">filiere</label>
                                                            <input type="text" class="form-control" name="name" id="name"
                                                                class="form-control @error('session') is-invalid @enderror"
                                                                placeholder="nom filiere">
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-success">enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <hr>
                        </div>

                    </div>


                    <div class="card-body collapse show">
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
                                    @foreach ($filieres as $filiere)
                                        <tr>
                                            <td>{{ $filiere->id }} </td>
                                            <td>{{ $filiere->code }}</td>
                                            <td>{{ $filiere->name }}</td>

                                            <td style="text-align: center">

                                                <div class="btn-group">

                                                    <a href="{{ route('admin.filiere.delete', $filiere) }}"
                                                        class="btn btn-outline-danger " data-toggle="tooltip"
                                                        data-placement="bottom" title="delete">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>

                                                    <a class="btn btn-primary" type="button" data-toggle="collapse"
                                                        data-target="#contentId--{{ $filiere->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="contentId--{{ $filiere->id }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>


                                            </td>
                                            <div class="collapse" id="contentId--{{ $filiere->id }}">
                                                <div class="card-title">

                                                    <h2 class="modal-title" id="exampleModalCenterTitle">Modifié le filiere
                                                         </h2>
                                                    <hr>
                                                </div>
                                                <div class="form-group">
                                                    <form action="{{ route('admin.filiere.update', $filiere) }}"
                                                        method="post">
                                                        @csrf

                                                        <div class="form-group">
                                                            <label for="session">code</label>
                                                            <input type="text" value="{{ $filiere->code }}"
                                                                class="form-control" name="code" id="code"
                                                                class="form-control @error('session') is-invalid @enderror"
                                                                placeholder="code filiere">
                                                            @error('code')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="session">filiere</label>
                                                            <input type="text" value="{{ $filiere->name }}"
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
                                                            <button type="submit"
                                                                class="btn btn-success">enregistrer</button>
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
