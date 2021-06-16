@extends('backend.layouts.template')


@section('title')
<h1 class="card-title">Gestion des Emprunts</h1>

@endsection
@section('option')

@endsection
@section('option-panel')
   
@endsection
@section('data')
<div class="card-block card-dashboard">
    <table class="table table-striped table-bordered zero-configuration">
        <thead>
            <tr>

                <th>étudiant</th>
                <th>livre</th>
                <th>status</th>
                <th>date emprunt</th>
                <th>date retour</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book_issues as $book_issue)
                <tr>
                    <td>
                        <a href=" {{ route('admin.classes.show_student', $book_issue->student) }} "
                            class="btn btn-info">
                            {{ $book_issue->student->user->prenom . ' ' . $book_issue->student->user->nom }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('books.show', $book_issue->book) }}"
                            class="btn btn-info btn-sm" type="button"> {{ $book_issue->book->name }}
                        </a>
                    </td>
                    <td>{{ $book_issue->status }}</td>
                    <td>{{ $book_issue->issue_date }}</td>
                    <td>{{ $book_issue->return_date }}</td>


                    <td style="text-align: center">

                        <div class="btn-group">
                            <a href="{{ route('admin.book_issu.show', $book_issue) }}"
                                class="btn btn-outline-info " data-content="Show" data-placement="top"
                                data-trigger="hover" data-toggle="tooltip" data-placement="top"
                                title="détail">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>


                        </div>


                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>

                <th>étudiant</th>
                <th>livre</th>
                <th>status</th>
                <th>date emprunt</th>
                <th>date retour</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

