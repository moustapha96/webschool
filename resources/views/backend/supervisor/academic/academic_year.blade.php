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
                                    <h4 class="card-title">Gestion des années académiques</h4>
                                </div>
                                <div class="col-md-6" id="headingCollapse1">
                                    <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
                                        aria-controls="collapse1" class="btn btn-info float-right btn-sm">Ajouter une
                                        année</a>

                                </div>
                                <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1"
                                    class="collapse col-md-12">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <form action="{{ route('academic_year.add') }}" method="post">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="form-group row pl-2">
                                                            <label for="session">Session</label>
                                                            <input type="text" class="form-control" name="session"
                                                                id="session"
                                                                class="form-control @error('session') is-invalid @enderror"
                                                                placeholder="Session">
                                                            @error('session')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row pl-2">
                                                            <label for="year">Année académique</label>
                                                            <input type="text" class="form-control" name="year" id="year"
                                                                class="form-control @error('year') is-invalid @enderror"
                                                                placeholder="Année">
                                                            @error('year')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <hr>
                                                        <button type="submit"
                                                            class="btn btn-success fa-pull-right">Enregistrer</button>

                                                    </div>

                                                </div>


                                            </form>
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
                                        <th>ID</th>
                                        <th>Session</th>
                                        <th>Année</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($academic_years as $academic_year)
                                        <tr class="p-0">
                                            <td class="p-2">{{ $academic_year->id }}</td>
                                            <td class="p-2">{{ $academic_year->session }}</td>
                                            <td class="p-2">{{ $academic_year->year }}</td>
                                            <td width="30%" class="p-2" style="text-align: right;">


                                                    {{-- année pas encore arrivée --}}
                                                    @if ($academic_year->year > get_setting('academic_year'))
                                                        <a data-toggle="modal"
                                                            data-target="#modalActivaion-{{ $academic_year->id }}"
                                                            role="button" class="btn btn-outline-success btn-sm">Activer</a>

                                                        <a role="button" class="btn btn-outline-warning btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#modalEdit-{{ $academic_year->id }}"><i
                                                                class="fa fa-edit"></i></a>
                                                        <a href="{{ route('academic_year.delete', $academic_year) }}"
                                                            role="button" class="btn btn-outline-danger btn-sm mr-2"><i
                                                                class="fa fa-trash"></i></a>

                                                        {{-- modal  confirmation activation anné en cours --}}
                                                        <div class="modal" class="modal fade"
                                                            id="modalActivaion-{{ $academic_year->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="modalActivationcentre"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Confirmation</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Voulez-vous activer cette année académique comme
                                                                            l'année en cours ?'</p>
                                                                        <p class="text-secondary"><small>La valeur de
                                                                                l'année académique dans paramètre sera
                                                                                modifié '</small></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form
                                                                            action="{{ route('academic_year.activate', $academic_year) }}"
                                                                            methode="get">
                                                                            @csrf
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Annuler</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Activre cette
                                                                                année</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- fin modal --}}


                                                        {{-- modal  Modification activation anné en cours --}}
                                                        <div class="modal" class="modal fade"
                                                            id="modalEdit-{{ $academic_year->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="modalActivationcentre"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalCenterTitle">Modification d'une
                                                                            Année académique</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <form
                                                                                action="{{ route('academic_year.updated', $academic_year) }}"
                                                                                method="post">
                                                                                @csrf

                                                                                <div class="form-group">
                                                                                    <label for="session">Session</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="session" id="session"
                                                                                        value="{{ $academic_year->session }}"
                                                                                        class="form-control @error('session') is-invalid @enderror"
                                                                                        placeholder="session">
                                                                                    @error('session')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="year">Année
                                                                                        académique</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="year" id="year"
                                                                                        value="{{ $academic_year->year }}"
                                                                                        class="form-control @error('year') is-invalid @enderror"
                                                                                        placeholder="année en cours">
                                                                                    @error('year')
                                                                                        <span class="invalid-feedback"
                                                                                            role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="submit"
                                                                                        class="btn btn-success">Enregistrer</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- fin modal --}}
                                                    @endif

                                                    {{-- année en cours --}}
                                                    @if ($academic_year->year == get_setting('academic_year'))
                                                        <span class="badge badge-success float-right"> Année en cours....
                                                        </span>
                                                    @endif

                                                    {{-- année déjà terminée --}}

                                                    @if ($academic_year->year < get_setting('academic_year'))
                                                        <a href="{{ route('academic_year.delete', $academic_year) }}"
                                                            role="button" class="btn btn-outline-danger">Supprimer</a>
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
    </section>
@endsection

@section('scripts')

    <script src="{{ asset('app-assets/js/data-tables/datatable-basic.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/datatables.min.js') }}"></script>

    <script>
        $(.table).DataTable();

    </script>

    <script src="{{ asset('app-assets/js/components-modal.min.js') }}"></script>



@endsection
