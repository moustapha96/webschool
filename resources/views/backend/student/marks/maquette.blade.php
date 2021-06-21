@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-suitcase"></i>Maquête </h1>
    <h4 class="mt-2">Liste de vos matieres </h4>
    <h3> Maquette : {{ $classe->niveau->code . '-'.$classe->filiere->code }}</h3>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')

    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive justify-content-center ">

                <table class=" table-responsive table-bordered " border="0.5px">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 90px">Semestre</th>
                            <th style="width: 600px">Eléments Constitutifs</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($classe->semester as $semestre)

                            <tr>
                                <td style="width: 90px"> {{ $semestre->name }}</td>
                                <td style="width: 600px">
                                    <table class="table table-bordered" border="0.5px">
                                        <thead>
                                            @if ($semestre->name == 'Semestre 1' || $semestre->name == 'Semestre 3' || $semestre->name == 'Semestre 5')
                                                <tr>
                                                    <th style="width: 300px">UE</th>
                                                    <th style="width: 200px">EC</th>
                                                    <th style="width: 50px">Credit</th>
                                                </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            @foreach ($semestre->unitie as $unite)
                                                <tr>
                                                    <td style="width: 300px">{{ $unite->code }} {{ $unite->name }}
                                                    </td>
                                                    <td style="width: 200px">
                                                        <table class="table table-bordered" border="0.5px">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 150px">matiere</th>
                                                                    <th style="width: 50px">Coefficient</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($unite->subject as $subject)
                                                                    <tr>
                                                                        <td style="width: 150px">{{ $subject->name }}
                                                                        </td>
                                                                        <td style="width: 50px">
                                                                            {{ $subject->coefficient }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td style="width: 50px">{{ $unite->credit }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
