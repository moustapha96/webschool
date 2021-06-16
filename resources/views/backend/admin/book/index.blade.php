@extends('backend.layouts.template')


@section('title')
    <h1 class="card-title">Gestion des livres</h1>

@endsection
@section('option')
    <a href="{{ route('admin.book.create') }}" class="btn btn-info float-right " role="button"> <i class="fa fa-plus"
            aria-hidden="true"></i> Ajouter un livre</a>
    <a href="{{ route('admin.categories') }}" class=" btn btn-info float-right " role="button"> <i class="fa fa-plus"
            aria-hidden="true"></i> categorie</a>

@endsection
@section('option-panel')

@endsection
@section('data')
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

                                <a href="{{ route('books.show', $book) }}" class="btn btn-outline-dark " type="button"> <i
                                        class="fa fa-eye" aria-hidden="true"></i> </a>

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
@endsection

