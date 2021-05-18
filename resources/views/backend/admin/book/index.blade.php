

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
                                    <h4 class="card-title">Gestion des livres</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.book.create') }}" class="btn btn-info float-right "
                                        role="button"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un livre</a>
                                    <a href="{{ route('admin.categories') }}" class=" btn btn-info float-right "
                                        role="button"> <i class="fa fa-plus" aria-hidden="true"></i> categorie</a>
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
                                        <th>ISBN</th>
                                        <th>Titre</th>
                                        <th>Auteur</th>
                                        <th class="text-center">Quantité</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->ISBN }} </td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td class="text-center">{{ $book->quantity }}</td>


                                            <td style="text-align: center">

                                                <div class="btn-group">

                                                    <a href="{{ route('books.show', $book) }}"
                                                        class="btn btn-outline-dark " type="button">  <i class="fa fa-eye" aria-hidden="true"></i> </a>

                                                </div>


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
