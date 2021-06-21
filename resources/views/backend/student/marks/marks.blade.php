@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Notes contrôles</h1>
    <p>Vos notes de controles</p>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <h3> Notes</h3>


                <div class="table-responsive">


                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>UE</th>
                                <th>matiere</th>
                                <th>Type controle</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>{{ $note->subject->unitie->code }}-{{ $note->subject->unitie->name }}</td>
                                    <td>{{ $note->subject->name }}</td>
                                    <td>{{ $note->typeNote }}</td>
                                    <td>{{ $note->mark_value }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>UE</th>
                                <th>matiere</th>
                                <th>Type controle</th>
                                <th>Note</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
