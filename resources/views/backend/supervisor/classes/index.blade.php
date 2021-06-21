@extends('backend.layouts.template')


@section('title')
<h4 class="card-title">Gestion des classes</h4>
@endsection
@section('option')
<a data-toggle="collapse" class="btn btn-primary  float-right btn-sm"
data-parent="#accordianId" href="#section1ContentId" aria-expanded="true"
aria-controls="section1ContentId">
<i class="fa fa-plus" aria-hidden="true"></i> ajouter une classe
</a>

@endsection
@section('option-panel')
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
@endsection
@section('data')
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
@endsection

