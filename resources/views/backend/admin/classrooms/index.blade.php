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
                                    <h4 class="card-title">Liste des Salles de classe</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.classrooms.create') }}" class="btn btn-info float-right btn-sm" role="button" >Ajouter une salle de classe</a>

                                </div>
                            </div>
                            
                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead class="thead-dark">
                                  <tr style="text-align: center;">
                                    <th  scope="col" style="width: 10%">Nom Salle</th>
                                    <th  scope="col" style="width: 10%">Description</th>
                                    <th  scope="col" style="width: 10%">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!-- Le corps du tableau ici -->
                                  @foreach($classrooms as $classroom)
                                  <tr>
                                    <td scope="col" style="width: 10%">{{ $classroom->name }}</td>
                                    <td scope="col" style="width: 10%">{{ $classroom->description }}</td>  
                                    <td scope="col" style="text-align: center; width: 10%">
                                    <a class="btn btn-warning" href="{{route('admin.classrooms.edit',$classroom->id) }}" role="button"> Modifier</a>
                                    <a class="btn btn-danger" href="{{route('admin.classrooms.delete',$classroom->id) }}" role="button"> Supprimer</a>
                                    </td>  
                                  </tr>
                                  @endforeach
                  
                                </tbody>
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


