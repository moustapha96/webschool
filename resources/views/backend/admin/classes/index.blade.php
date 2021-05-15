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
                                                    <form action="{{ route('admin.classe.create') }}" method="post">
                                                        @csrf

                                                        <div class="form-group col-md-12">
                                                            <label for="categori">{{ __('Filiere') }}</label>
                    
                                                            <select class="form-control" name="filiere_id" id="filiere_id" required>
                                                                <option></option>
                                                                @foreach ($filieres as $filiere)
                                                                    <option value="{{ $filiere->id }}"> {{ $filiere->name }} </option>
                    
                                                                @endforeach
                                                            </select>
                    
                    
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="categori">{{ __('Niveau') }}</label>
                    
                                                            <select class="form-control" name="niveau_id" id="niveau_id" required>
                                                                <option></option>
                                                                @foreach ($niveaux as $niveau)
                                                                    <option value="{{ $niveau->id }}"> {{ $niveau->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="categori">{{ __('salle de classe') }}</label>
                    
                                                            <select class="form-control" name="salle_id" id="salle_id" required>
                                                                <option></option>
                                                                @foreach ($salles as $salle)
                                                                    <option value="{{ $salle->id }}"> {{ $salle->name }} </option>
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
                                        <th>Nom</th>
                                        <th>Code</th>
                                        <th>Salle</th>
                                        <th>Eff.</th>
                                        <th>Semestre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $classe)
                                        <tr>
                                            <td scope="col" style="width: 40%">{{ $classe->nameClass }}</td>
                                            <td scope="col" style="width: 10%">{{ $classe->code }}</td>
                                            <td scope="col" style="width: 20%">{{ $classe->classroom->name }}</td>
                                            <td scope="col" style="width: 10%" class="hover">
                                                <a href="{{ route('admin.classes.liste_student', $classe) }}"
                                                    class="btn btn-link  hover"> {{ $classe->student->count() }}</a>
                                            </td>
                                            <td scope="col" style="width: 20%">
                                                @if ($classe->semester->count() != 0)
                                                    <a href="{{ route('admin.classes.liste_semestre', $classe) }}"
                                                        class="btn  hover  btn-info">liste</a>
                                                @else
                                                    Vide
                                                @endif
                                            </td>

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
