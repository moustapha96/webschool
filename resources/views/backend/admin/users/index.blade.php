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
                                    <h4 class="card-title">Tous les utilisateurs</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-info float-right btn-sm" role="button" >Ajouter</a>

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
                                    <th  scope="col" style="width: 10%">Nom complet</th>
                                    <th  scope="col" style="width: 10%">Email</th>
                                    <th  scope="col" style="width: 10%">Role</th>
                                    <th  scope="col" style="width: 10%">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!-- Le corps du tableau ici -->
                                  @foreach($users as $user)
                                  <tr>
                                    <td scope="col" style="width: 10%">{{ ucwords($user->prenom . ' ' . $user->nom) }}</td>
                                    <td scope="col" style="width: 10%">{{ $user->email }}</td>  
                                    <td scope="col" style="width: 10%">{{ get_user_role($user->role) }}</td>  

                                    <td scope="col" style="text-align: center; width: 10%">
                                    <a class="btn btn-warning" href="{{route('admin.users.edit',$user->id) }}" role="button"> <i class="fa fa-edit"></i></a>
                                    <a class="btn btn-info" href="{{route('admin.users.show',$user->id) }}" role="button"> Voir</a>

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
