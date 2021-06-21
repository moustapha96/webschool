@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-window-maximize" aria-hidden="true"></i>Liste des Unités
        d'enseignement</h1>
    <h4 class="mt-2">Unités {{ $semestre->code }} de la
        {{ $semestre->classe->nameClass }}</h4>
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
                    <th scope="col">Code</th>
                    <th scope="col">Nom UE </th>
                    <th scope="col">Semestre </th>
                    <th scope="col">classe </th>
                    <th scope="col">Matiere </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($semestre->unitie as $unite)
                    <tr>
                        <td scope="col">{{ $unite->code }}</td>
                        <td scope="col">{{ $unite->name }}</td>
                        <td scope="col">{{ $unite->semester->code }}</td>
                        <td scope="col">{{ $unite->semester->classe->nameClass }}</td>
                        <td scope="col">
                            @foreach ($unite->subject as $subject)
                                <table class="table table-striped">
                                    <td>{{ $subject->name }}</td>
                                </table>
                            @endforeach
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Nom UE </th>
                    <th scope="col">Semestre </th>
                    <th scope="col">classe </th>
                    <th scope="col">Matiere </th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
