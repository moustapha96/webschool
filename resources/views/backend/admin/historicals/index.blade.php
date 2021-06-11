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
                                    <h4 class="card-title">historiques des documents supprimés</h4>
                                </div>
                                <div class="col-md-6">


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
                                        <th>user</th>
                                        <th>documents</th>
                                        <th>date</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historiques as $histo)
                                        <tr>
                                            <td>{{ $histo->user->prenom .' ' . $histo->user->nom }} </td>
                                            <td>{{ $histo->object_name }}</td>
                                            <td>{{ $histo->created_at }}</td>

                                            <td style="text-align: center">

                                                <div class="btn-group">

                                                    <a href="{{ route('admin.historique.update', $histo) }}"
                                                        class="btn btn-outline-warning " data-toggle="tooltip"
                                                        data-placement="bottom" title="récupere">

                                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                                    </a>


                                                </div>


                                            </td>

                                        </tr>



                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>user</th>
                                        <th>documents</th>
                                        <th>date</th>
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
