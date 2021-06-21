@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Liste des emprunts</h1>
    <p>Liste des livres empruntés </p>

@endsection
@section('option')
    <a href="{{ route('librian.book_issu.new') }}" class="btn btn-outline-success" role="button">Nouveau emprunt</a>

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
                            <th>étudiant</th>
                            <th>Livre</th>
                            <th>Commentaire</th>
                            <th>statut</th>
                            <th>date Emprunt</th>
                            <th>Date retour</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Le corps du tableau ici -->
                        @foreach ($book_issues as $book_issu)
                            <tr>
                                <td>{{ $book_issu->student_id }}</td>
                                <td>{{ $book_issu->book_id }}</td>
                                <td>{{ $book_issu->comment }}</td>
                                <td>{{ $book_issu->status }}</td>
                                <td>{{ $book_issu->issue_date }}</td>
                                <td>{{ $book_issu->return_date }}</td>


                                <td style="text-align: center">

                                    <a href="{{ route('librian.book_issu.show', $book_issu) }}"
                                        class="btn btn-outline-info " data-content="Show" data-placement="top"
                                        data-trigger="hover" data-toggle="tooltip" data-placement="top" title="détail">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>

                                    <a href="{{ route('librian.book_issu.edit', $book_issu) }}"
                                        class="btn btn-outline-warning " data-content="Edit" data-placement="top"
                                        data-trigger="hover" data-toggle="tooltip" data-placement="bottom" title="editer">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('librian.book_issu.destroy', $book_issu) }}"
                                        class="btn btn-outline-danger " data-content="delete" data-placement="top"
                                        data-trigger="hover" data-toggle="tooltip" data-placement="bottom" title="delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    @if ($book_issu->status === 1)
                                        <a href="{{ route('librian.book_issu.return', $book_issu) }}"
                                            class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top"
                                            title="rendre le livre">
                                            rendre le livre
                                        </a>
                                    @endif
                                </td>
                            </tr>


                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
