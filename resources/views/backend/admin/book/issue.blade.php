@extends('backend.layouts.template')


@section('title')
    <h1 class="card-title">Gestion des Emprunts</h1>

@endsection
@section('option')
    <a class="btn btn-outline-primary  float-right btn-sm" data-toggle="modal" data-target="#modalCategorie"
        role="button"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-plus" aria-hidden="true"></i>
        emprunt</a>

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration">
            <thead>
                <tr>

                    <th>Student</th>
                    <th>Book</th>
                    <th>Comment</th>
                    <th>status</th>
                    <th>Issu date</th>
                    <th>due date</th>
                    <th>return date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book_issues as $book_issu)
                    <tr>
                        <td>{{ $book_issu->id }} </td>
                        <td>
                            <a href=" {{ route('admin.classes.show_student', $book_issu->student) }} "
                                class="btn btn-info">
                                {{ $book_issu->student->user->prenom }}
                                {{ $book_issu->student->user->prenom }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('books.show', $book_issu->book) }}" class="btn btn-info btn-sm"
                                type="button"> {{ $book_issu->book_id }}
                            </a>
                        </td>
                        <td>{{ $book_issu->comment }}</td>
                        <td>{{ $book_issu->status }}</td>
                        <td>{{ $book_issu->issue_date }}</td>
                        <td>{{ $book_issu->due_date }}</td>
                        <td>{{ $book_issu->return_date }}</td>


                        <td style="text-align: center">

                            <div class="btn-group">
                                <a href="{{ route('book_issu.show', $book_issu) }}" class="btn btn-outline-info "
                                    data-content="Show" data-placement="top" data-trigger="hover" data-toggle="tooltip"
                                    data-placement="top" title="détail">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>


                            </div>


                        </td>
                    </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>

                    <th>Student</th>
                    <th>Book</th>
                    <th>Comment</th>
                    <th>status</th>
                    <th>Issu date</th>
                    <th>due date</th>
                    <th>return date</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
