{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-suitcase"></i>Gestion des UE</h1>
                <p class="mt-2">Ajout d'une unités d'enseignements</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a class="btn btn-outline-primary" href="{{ url()->previous() }}"><i
                            class="fa fa-reply"></i> Retour</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <form class="form-group" action="{{ route('unity.storeU') }}" method="post">

                            @csrf


                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="code">{{ __('Code : ') }}</label>
                                    <input type="text" name="code" class="form-control  @error('code') is-invalid @enderror"
                                        id="code" placeholder="code de l'unité " required aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">exemple : UE2</small>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="name">{{ __('Nom UE : ') }}</label>
                                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" placeholder="Nom de l'unité " required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-12">
                                    <label for="inputState">Semestre: </label>
                                    <select id="inputState" name="semestre_id" class="form-control">
                                        <option></option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}"> {{ $semester->code }} --
                                                {{ $semester->classe->nameClass }} </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="form-group col-md-12">
                                    <label for="credit">{{ __('credit UE : ') }}</label>
                                    <input type="number" name="credit"
                                        class="form-control  @error('credit') is-invalid @enderror" id="credit"
                                        placeholder="credit de l'unité " required>
                                    @error('credit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row">
                                <div class="mx-auto align-content-center">
                                    <button type="submit" class="btn btn-primary" name="button">enregistrer</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('scripts')

@endsection --}}



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
                                    <h4><i class="fa fa-suitcase"></i>Gestion des UE</h4>
                                    <p class="mt-2">Ajout d'une unités d'enseignements</p>
                                </div>
                                <div class="col-md-6">
                                    <a  class="btn btn-info float-right btn-sm" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <div class="tile">
                                <div class="tile-body">

                                    <form class="form-group" action="{{ route('unity.storeU') }}" method="post">

                                        @csrf


                                        <div class="form-row">

                                            <div class="form-group col-md-12">
                                                <label for="code">{{ __('Code : ') }}</label>
                                                <input type="text" name="code"
                                                    class="form-control  @error('code') is-invalid @enderror" id="code"
                                                    placeholder="code de l'unité " required aria-describedby="helpId">
                                                <small id="helpId" class="text-muted">exemple : UE2</small>
                                                @error('code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label for="name">{{ __('Nom UE : ') }}</label>
                                                <input type="text" name="name"
                                                    class="form-control  @error('name') is-invalid @enderror" id="name"
                                                    placeholder="Nom de l'unité " required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label for="inputState">Semestre: </label>
                                                <select id="inputState" name="semestre_id" class="form-control">
                                                    <option></option>
                                                    @foreach ($semesters as $semester)
                                                        <option value="{{ $semester->id }}"> {{ $semester->code }} --
                                                            {{ $semester->classe->nameClass }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                              <label for="inputState">Classe: </label>
                                              <select id="inputState" name="class_id" class="form-control">
                                                  <option></option>
                                                  @foreach ($classes as $classe)
                                                      <option value="{{ $classe->id }}">
                                                          {{ $classe->nameClass }} </option>
                                                  @endforeach
                                              </select>
                                          </div>



                                            <div class="form-group col-md-12">
                                                <label for="credit">{{ __('credit UE : ') }}</label>
                                                <input type="number" name="credit"
                                                    class="form-control  @error('credit') is-invalid @enderror" id="credit"
                                                    placeholder="credit de l'unité " required>
                                                @error('credit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="mx-auto align-content-center">
                                                <button type="submit" class="btn btn-primary"
                                                    name="button">enregistrer</button>
                                            </div>
                                        </div>
                                    </form>

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
