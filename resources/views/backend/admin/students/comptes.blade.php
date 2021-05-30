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
                                    <h4 class="card-title">Liste des étudiants</h4>
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
                                        <th>Nom complet</th>
                                        <th>Email</th>
                                        <th>compte</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($students as $stu)
                                        <tr>
                                            <td>{{ ucwords($stu->user->prenom . ' ' . $stu->user->nom) }}</td>
                                            <td>{{ $stu->user->email }}</td>

                                            <td>
                                                <form class="form-group"
                                                    action="{{ route('admin.student.updateCompte', $stu->user) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                            <input onchange="alert('coucou ')" type="checkbox" name="status"
                                                                id="status"
                                                                {{ $stu->user->status == '1' ? 'checked' : '' }}
                                                                autocomplete="off">
                                                        </label>

                                                    </div>
                                                </form>
                                            </td>

                                            <td scope="col" style="text-align: center; width: 10%">


                                                <a class="btn btn-warning" href="{{ route('user.edit', $stu->user->id) }}"
                                                    role="button"> <i class="fa fa-edit"></i></a>


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
