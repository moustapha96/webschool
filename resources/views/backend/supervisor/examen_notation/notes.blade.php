{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">


        <div class="app-title">

            <div>
                <h1><i class="fa fa-sticky-note"></i>Notes étudiant</h1>
                <p>étudiant : {{ $student->user->prenom }}-{{ $student->user->nom }}</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>

            </ul>
        </div>
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
                                <p class="text-center justify-content-center">Un peuple - Un but - Une fois</p>
                                <p class="text-center justify-content-center">MINISTERE DE L’ENSEIGNEMENT SUPERIEUR, DE LA
                                    RECHERCHE ET DE L’INNOVATION </p>
                            </div>
                            <div class="justify-content-lg-start">
                                <p><u> Prénom et Nom </u> : <strong class="text-uppercase"> {{ $student->user->prenom }}
                                        {{ $student->user->nom }} </strong></p>
                                <p><u> Email </u> : <strong class="text-uppercase"> {{ $student->user->email }}</strong>
                                </p>
                                <p><u> Classe </u> : <strong class="text-uppercase">
                                        {{ $student->classe->nameClass }}</strong></p>
                            </div>
                        </div>
                       
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
                                       
                                        @foreach ($data['semestre'] as $semestre)
                                            <tr>
                                                <td style="width: 5%">{{ $semestre['semestre'] }}</td>
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
                                                           
                                                            @foreach ($semestre['unite'] as $unite)
                                                                <tr>
                                                                    <td style="width: 5%">{{ $unite['code'] }}
                                                                        {{ $unite['unite'] }}</td>
                                                                    <td>
                                                                        <table>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="width: 5%">Nom</th>
                                                                                    <th style="width: 5%">Moyenne</th>
                                                                                    <th style="width: 5%">coefficient</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                
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
                                                                    <td style="width: 5%">{{ $unite['moyenne_unite'] }}
                                                                    </td>
                                                                    <td style="width: 5%">{{ $unite['credit_obtenu'] }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="width: 5%"> {{ $semestre['moyenne_semestre'] }}</td>
                                                <td style="width: 5%"> {{ $semestre['credit_obtenu'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                       

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
    </main>
@endsection


@section('scripts')

    <link rel="stylesheet" href="css/bulletin-style.css">
@endsection
 --}}



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
                                    <h1><i class="fa fa-sticky-note"></i>Notes étudiant</h1>
                                    <p>étudiant : {{ $student->user->prenom }}-{{ $student->user->nom }}</p>
                                </div>
                                <div class="col-md-6">

                                    <a href="{{ route('student.imprimer_bulletin', $student) }}"
                                        class="btn btn-info float-right btn-sm">
                                        imprimer bulletin de notes</a>

                                    <a href="{{ url()->previous() }}" class="btn btn-info float-right btn-sm"
                                        role="button"> <i class="fa fa-reply" aria-hidden="true"></i> Retour</a>

                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <div class="row">

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="py-1 d-flex justify-content-end">
                                        <a href="{{ route('student.imprimer_bulletin', $student) }}"
                                            class="btn btn-outline-secondary"> imprimer bulletin de notes</a>
                                    </div>
                                    <div class="tile">
                                        <div class="tile-body">

                                            <div>
                                                <div style="text-align: center">
                                                    <img src="/images/settings/logo.png"
                                                        style="width:100px; height:100px; border-radius:50%;">

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
                                                            {{ $student->classe->nameClass }}</strong></p>
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
                                                                                                        <th
                                                                                                            style="width: 5%">
                                                                                                            Nom</th>
                                                                                                        <th
                                                                                                            style="width: 5%">
                                                                                                            Moyenne</th>
                                                                                                        <th
                                                                                                            style="width: 5%">
                                                                                                            coefficient</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    {{-- les matieres dans chaque EC --}}
                                                                                                    @foreach ($unite['matiere'] as $matiere)
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                style="width: 5%">
                                                                                                                {{ $matiere['matiere'] }}
                                                                                                            </td>
                                                                                                            <td
                                                                                                                style="width: 5%">
                                                                                                                {{ $matiere['moyenne_matiere'] }}
                                                                                                            </td>
                                                                                                            <td
                                                                                                                style="width: 5%">
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
