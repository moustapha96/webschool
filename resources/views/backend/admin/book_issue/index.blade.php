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
                                    <h4 class="card-title">Gestion des Emprunts</h4>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-outline-secondary float-right "
                                        href="{{ route('admin.book_issu.create') }}" role="button"><i
                                            class="fa fa-plus"></i> ajouter un emprunt</a>

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
                                                        class="btn btn-outline-info " data-content="Show"
                                                        data-placement="top" data-trigger="hover" data-toggle="tooltip"
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
