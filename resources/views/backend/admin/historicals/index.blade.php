@extends('backend.layouts.template')


@section('title')
    <h3 class="card-title">historiques des documents supprimés</h3>

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
                    <th>user</th>
                    <th>documents</th>
                    <th>date</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historiques as $histo)
                    <tr>
                        <td>{{ $histo->user->prenom . ' ' . $histo->user->nom }} </td>
                        <td>{{ $histo->object_name }}</td>
                        <td>{{ $histo->created_at }}</td>
                        <td style="text-align: center">
                            <div class="btn-group">
                                <a href="{{ route('admin.historique.update', $histo) }}" class="btn btn-outline-warning "
                                    data-toggle="tooltip" data-placement="bottom" title="récupere">

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
@endsection
