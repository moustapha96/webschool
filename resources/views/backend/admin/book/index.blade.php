{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-book"></i> Bibliothèque</h1>
                <p>Liste des livres disponibles</p>
            </div>

        </div>

        @if (session()->has('messageSuccess'))
            <div class="alert alert-success">
                {{ session()->get('messageSuccess') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <h2>Liste des livres </h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
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
                                    <!-- Le corps du tableau ici -->
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->ISBN }} </td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td class="text-center">{{ $book->quantity }}</td>


                                            <td style="text-align: center">

                                                <div class="btn-group">

                                                    <a href="{{ route('books.show', $book) }}"
                                                        class="btn btn-primary btn-sm" type="button">Voir</a>

                                                </div>


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
    </main>
@endsection



@section('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();

    </script>




@endsection --}}


{{-- datatable --}}

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
                                    <a href="{{ route('admin.book.create') }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un livre</a>
                                    <a href="{{ route('admin.categories') }}" class=" btn btn-info float-right btn-sm"
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
                                                        class="btn btn-primary btn-sm" type="button">Voir</a>

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
