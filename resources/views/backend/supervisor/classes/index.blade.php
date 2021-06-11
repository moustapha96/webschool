{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users" aria-hidden="true"></i>Gestion des Classes</h1>
                <p>Liste des classes</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
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
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th>
                                        <th>Nom</th>
                                        <th>Liste des étudiants </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td>{{ $classe->id }}</td>
                                            <td>{{ $classe->code }}</td>
                                            <td>{{ $classe->nameClass }}</td>
                                            <td>
                                                @if ($classe->student->count() == 0)
                                                    0 étudiant
                                                @else
                                                    <a href="{{ route('reinscription_student.liste', $classe->id) }}"
                                                        class="btn btn-outline-info">{{ $classe->student->count() }}
                                                        étudiant(s) </a>
                                            </td>
                                    @endif

                                    </td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();

    </script>
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
                                    <h4 class="card-title">Gestion des classes</h4>
                                </div>
                                <div class="col-md-6">

                                    <a data-toggle="collapse" class="btn btn-primary  float-right btn-sm"
                                        data-parent="#accordianId" href="#section1ContentId" aria-expanded="true"
                                        aria-controls="section1ContentId">
                                        <i class="fa fa-plus" aria-hidden="true"></i> ajouter une classe
                                    </a>

                                </div>
                            </div>
                            <div id="accordianId" role="tablist" aria-multiselectable="true">
                                <div class="card">

                                    <div id="section1ContentId" class="collapse in" role="tabpanel"
                                        aria-labelledby="section1HeaderId">
                                        <div class="card-body">
                                            <div>
                                                <div class="form-group">
                                                    <form action="{{ route('supervisor.classe.store') }}" method="post">
                                                        @csrf

                                                        <div class="form-group col-md-12">
                                                            <label for="filiere">{{ __('Filiere') }}</label>

                                                            <select class="form-control" name="filiere_id" id="filiere_id"
                                                                required>
                                                                <option></option>
                                                                @foreach ($filieres as $filiere)
                                                                    <option value="{{ $filiere->id }}">
                                                                        {{ $filiere->name }} </option>

                                                                @endforeach
                                                            </select>


                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="niveau">{{ __('Niveau') }}</label>

                                                            <select class="form-control" name="niveau_id" id="niveau_id"
                                                                required>
                                                                <option></option>
                                                                @foreach ($niveaux as $niveau)
                                                                    <option value="{{ $niveau->id }}">
                                                                        {{ $niveau->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="classroom">{{ __('salle de classe') }}</label>

                                                            <select class="form-control" name="classroom_id"
                                                                id="classroom_id" required>
                                                                <option></option>
                                                                @foreach ($salles as $salle)
                                                                    <option value="{{ $salle->id }}">
                                                                        {{ $salle->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-success">enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <th>Filiere</th>
                                        <th>Niveau</th>
                                        <th>Salle</th>
                                        <th>Eff.</th>
                                        <th>Semestre</th>
                                        <th>option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td scope="col" style="width: 40%">
                                                {{ $classe->filiere->name }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->niveau->name }} </td>
                                            <td scope="col" style="width: 20%">{{ $classe->classroom->name }}</td>
                                            <td scope="col" style="width: 10%" class="hover">
                                                <a href="{{ route('supervisor.classes.liste_student', $classe) }}"
                                                    class="btn btn-outline-link  hover">
                                                    {{ $classe->student->count() }}</a>
                                            </td>
                                            <td scope="col" style="width: 20%">
                                                @if ($classe->semester->count() != 0)
                                                    <a href="{{ route('supervisor.classe.semester', $classe) }}"
                                                        class="btn hover btn-outline-info">liste</a>
                                                @else
                                                    Vide
                                                @endif
                                            </td>
                                            <td scope="col" style="width: 10%" class="hover">
                                                <a class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#contentId--{{ $classe->id }}" aria-expanded="false"
                                                    aria-controls="contentId--{{ $classe->id }}">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>

                                            </td>
                                            <div class="collapse" id="contentId--{{ $classe->id }}">
                                                <div class="card-title">

                                                    <h2 class="modal-title" id="exampleModalCenterTitle">Modifié la classe
                                                    </h2>
                                                    <hr>
                                                </div>
                                                <div class="form-group">
                                                    <form action="{{ route('supervisor.classe.update', $classe) }}"
                                                        method="post">
                                                        @csrf

                                                        <div class="form-group col-md-12">
                                                            <label for="filiere">{{ __('Filiere') }}</label>

                                                            <select class="form-control" name="filiere_id" id="filiere_id"
                                                                required>
                                                                <option></option>
                                                                @foreach ($filieres as $filiere)
                                                                    <option value="{{ $filiere->id }}"  {{ $filiere->id == $classe->filiere_id ? 'selected' : '' }} >
                                                                        {{ $filiere->name }} </option>

                                                                @endforeach
                                                            </select>


                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="niveau">{{ __('Niveau') }}</label>

                                                            <select class="form-control" name="niveau_id" id="niveau_id"
                                                                required>
                                                                <option></option>
                                                                @foreach ($niveaux as $niveau)
                                                                    <option value="{{ $niveau->id }}" {{ $niveau->id == $classe->niveau_id ? 'selected' : '' }}>
                                                                        {{ $niveau->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="classroom">{{ __('salle de classe') }}</label>

                                                            <select class="form-control" name="classroom_id"
                                                                id="classroom_id" required>
                                                                <option></option>
                                                                @foreach ($salles as $salle)
                                                                    <option value="{{ $salle->id }}" {{ $salle->id == $classe->classroom_id ? 'selected' : '' }}>
                                                                        {{ $salle->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-success">enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Code</th>
                                        <th>Salle</th>
                                        <th>Eff.</th>
                                        <th>Semestre</th>
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
