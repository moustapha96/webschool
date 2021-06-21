@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Livres</h1>
    <p>Liste des livres de la bibliothèque </p>

@endsection
@section('option')
    <a href="{{ route('librian.book.create') }}" class="btn btn-outline-success" role="button">ajouter un livre</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                    <thead>
                        <tr>
                            <th>nom du Livre</th>
                            <th>Auteur</th>
                            <th>ISBN</th>
                            <th>quantité</th>
                            <th>catégorie</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Le corps du tableau ici -->
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->ISBN }}</td>
                                <td>{{ $book->quantity }}</td>
                                <td>{{ $book->categorie->name }}</td>


                                <td style="text-align: center">

                                    <div class="btn-group">
                                        <a href="{{ route('librian.book.show', $book) }}" class="btn btn-outline-info "
                                            data-content="Show" data-placement="top" data-trigger="hover"
                                            data-toggle="tooltip" data-placement="top" title="détail">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>

                                        <a href="{{ route('librian.book.edit', $book->id) }}"
                                            class="btn btn-outline-warning " data-content="Edit" data-placement="top"
                                            data-trigger="hover" data-toggle="tooltip" data-placement="bottom"
                                            title="editer">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('librian.book.destroy', $book->id) }}"
                                            class="btn btn-outline-danger " data-content="delete" data-placement="top"
                                            data-trigger="hover" data-toggle="tooltip" data-placement="bottom"
                                            title="delete">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>

                                    </div>


                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
