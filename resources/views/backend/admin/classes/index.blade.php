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
                            <h4 class="card-title">Liste des Classes</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Code</th>
                                        <th>Salle</th>
                                        <th>Eff.</th>
                                        <th>Semestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td scope="col" style="width: 40%">{{ $classe->nameClass }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->code }}</td>
                                            <td scope="col" style="width: 20%">{{ $classe->classroom->name }}</td>
                                            <td scope="col" style="width: 10%" class="hover">
                                                <a href="{{ route('admin.classes.liste_student', $classe) }}"
                                                    class="btn btn-link  hover"> {{ $classe->student->count() }}</a>
                                            </td>
                                            <td scope="col" style="width: 20%">
                                                @if ($classe->semester->count() != 0)
                                                    <a href="{{ route('admin.classes.liste_semestre', $classe) }}"
                                                        class="btn  hover  btn-info">liste</a>
                                                @else
                                                    Vide
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Code</th>
                                        <th>Salle</th>
                                        <th>Eff.</th>
                                        <th>Semestre</th>
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
