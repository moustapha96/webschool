@extends('backend.layouts.template')


@section('title')
    <h1><i class="fa fa-sticky-note"></i>Notes étudiant</h1>
    <p>étudiant : {{ $student->user->prenom }}-{{ $student->user->nom }}</p>
@endsection
@section('option')
    <a href="{{ route('student.imprimer_bulletin', $student) }}" class="btn btn-info float-right btn-sm">
        imprimer bulletin de notes</a>
@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="card-block card-dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="py-1 d-flex justify-content-end">
                    <a href="{{ route('student.imprimer_bulletin', $student) }}" class="btn btn-outline-secondary">
                        imprimer bulletin de notes</a>
                </div>
                <div class="tile">
                    <div class="tile-body">

                        <div>
                            <div style="text-align: center">
                                <img src="/images/settings/logo.png" style="width:100px; height:100px; border-radius:50%;">

                            </div>
                            <div class="mx-auto">
                                <p class="text-center justify-content-center">République du sénégal </p>
                                <p class="text-center justify-content-center">Un peuple - Un but - Une
                                    fois</p>
                                <p class="text-center justify-content-center">MINISTERE DE
                                    L’ENSEIGNEMENT SUPERIEUR, DE LA RECHERCHE ET DE L’INNOVATION </p>
                            </div>
                            <div class="justify-content-lg-start">
                                <p><u> Prénom et Nom </u> : <strong class="text-uppercase">
                                        {{ $student->user->prenom }} {{ $student->user->nom }}
                                    </strong></p>
                                <p><u> Email </u> : <strong class="text-uppercase">
                                        {{ $student->user->email }}</strong></p>
                                <p><u> Classe </u> : <strong class="text-uppercase">
                                        {{ $student->classe->niveau->code.' '.$student->classe->filiere->code }}</strong></p>
                            </div>
                        </div>
                        {{-- données bulletin --}}
                        <div class="mx-auto mt-2 d-flex justify-content-center">

                            <table class="table table-bordered" border="0.5px">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%">Semestre</th>
                                        <th style="width: 5%">EC</th>
                                        <th style="width: 5%">Moyenne</th>
                                        <th style="width: 5%">Crédit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datas as $data)
                                        {{-- les semestre --}}
                                        @foreach ($data['semestre'] as $semestre)
                                            <tr>
                                                <td style="width: 5%">{{ $semestre['semestre'] }}
                                                </td>
                                                <td>
                                                    <table>
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th style="width: 5%">Code </th>
                                                                <th style="width: 5%">Matiere</th>
                                                                <th style="width: 5%">Moyenne</th>
                                                                <th style="width: 5%">Credit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- les EC dans chaque semestre --}}
                                                            @foreach ($semestre['unite'] as $unite)
                                                                <tr>
                                                                    <td style="width: 5%">
                                                                        {{ $unite['code'] }}
                                                                        {{ $unite['unite'] }}</td>
                                                                    <td>
                                                                        <table>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width: 5%">
                                                                                        Nom</th>
                                                                                    <th style="width: 5%">
                                                                                        Moyenne</th>
                                                                                    <th style="width: 5%">
                                                                                        coefficient</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                {{-- les matieres dans chaque EC --}}
                                                                                @foreach ($unite['matiere'] as $matiere)
                                                                                    <tr>
                                                                                        <td style="width: 5%">
                                                                                            {{ $matiere['matiere'] }}
                                                                                        </td>
                                                                                        <td style="width: 5%">
                                                                                            {{ $matiere['moyenne_matiere'] }}
                                                                                        </td>
                                                                                        <td style="width: 5%">
                                                                                            {{ $matiere['coefficient'] }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td style="width: 5%">
                                                                        {{ $unite['moyenne_unite'] }}
                                                                    </td>
                                                                    <td style="width: 5%">
                                                                        {{ $unite['credit_obtenu'] }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width: 5%">
                                                    {{ $semestre['moyenne_semestre'] }}</td>
                                                <td style="width: 5%">
                                                    {{ $semestre['credit_obtenu'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{-- fin données --}}

                        {{-- tableau recapulatif --}}

                        <div class="row py-2">
                            <div class="mx-auto d-flex justify-content-center">
                                <table class="table-bordered" border="5px">
                                    <th> Année Academique </th>
                                    <th> Niveau </th>
                                    <th> Moyenne</th>
                                    <th> Credit </th>
                                    <tbody>
                                        <td>
                                            <strong class="ml-2">
                                                @php isset($academic_year) ? $academic_year = $academic_year." | " . get_setting('academic_year') : $academic_year = get_setting('academic_year')  ; @endphp
                                                {{ $academic_year }}
                                            </strong>

                                        </td>
                                        <td>Licence 1</td>
                                        <td>{{ $student->bulletin->average_student }}</td>
                                        <td>{{ $student->bulletin->credit }}</td>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

