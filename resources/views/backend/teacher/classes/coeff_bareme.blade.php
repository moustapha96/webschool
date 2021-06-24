@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Coéfficient et barème </h1>
    <h4 class="mt-2"> Liste de vos matières </h4>
@endsection
@section('option')

@endsection
@section('option-panel')



@endsection
@section('data')
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                <thead>
                    <tr>
                        <th>classe</th>
                        <th>semestre</th>
                        <th>UE</th>
                        <th>crédit UE</th>
                        <th>matiere</th>
                        <th>coefficient</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- Le corps du tableau ici -->
                    @foreach ($teacher->assign_subject as $assign_subject)
                        <tr>
                            <td>{{ $assign_subject->subject->unitie->semester->classe->niveau->code . ' ' . $assign_subject->subject->unitie->semester->classe->filiere->code }}
                            </td>
                            <td>{{ $assign_subject->subject->unitie->semester->name }}</td>
                            <td>{{ $assign_subject->subject->unitie->name }} </td>
                            <td>{{ $assign_subject->subject->unitie->credit }} </td>
                            <td>{{ $assign_subject->subject->name }} </td>
                            <td>{{ $assign_subject->subject->coefficient }} </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
