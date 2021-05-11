{{-- @extends('backend.layouts.main')


@section('seo')

@endsection


@section('main')
    <section class="app-content">

        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-o" aria-hidden="true"></i></i>Demande d'admission</h1>
                <p class="mt-2">Enregistrer une demande d'admisssion</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <a class="btn btn-dark" href="{{ url()->previous() }}" role="button">retour</a>
                </li>
            </ul>
        </div>


        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('admission_requests.store') }}" method="post">
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="ine">{{ __('INE') }}</label>
                                    <input type="text" name="ine" class="form-control @error('ine') is-invalid @enderror"
                                        id="ine" placeholder="ine" pattern="[0-9]{13}" required>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="prenom">{{ __('Prenom') }}</label>
                                    <input type="text" name="prenom"
                                        class="form-control @error('prenom') is-invalid @enderror" id="prenom"
                                        placeholder="prenom" required>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="nom">{{ __('Nom') }}</label>
                                    <input type="text" name="nom" class="form-control  @error('nom') is-invalid @enderror"
                                        id="nom" placeholder="nom" required>
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="dateNaissance">{{ __('Date de Naissance') }}</label>
                                    <input type="date" name="dateNaissance" format="DD-MM-YYYY"
                                        class="form-control @error('dateNaissance') is-invalid @enderror" id="dateNaissance"
                                        required>
                                    @error('dateNaissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                                    <input type="text" name="lieuNaissance"
                                        class="form-control @error('lieuNaissance') is-invalid @enderror" id="lieuNaissance"
                                        required>
                                    @error('lieuNaissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="adresse">{{ __('Adresse') }}</label>
                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                        id="adresse" name="adresse" required>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tel">{{ __('TEL') }} </label>
                                    <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel"
                                        name="tel" pattern="[0-9]{9}" required>

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="ex@example.com" name="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="genre">{{ __('genre  ') }}</label>
                                    <select id="genre" name="genre" class="form-control" required>
                                        <option value="Masculin">Masculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
                                    @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="classe">{{ __('Classe  ') }}</label>
                                    <select id="class_id" name="class_id" class="form-control" required>
                                        <option></option>
                                        @foreach ($classes as $classe)
                                            <option value="{{ $classe->id }}">{{ $classe->nameClass }}/option>
                                        @endforeach
                                    </select>
                                    @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="bulletin">{{ __('Bulletin') }}</label>
                                    <input type="file" class="form-control @error('bulletin') is-invalid @enderror"
                                        id="bulletin" placeholder="bulletin de note" name="bulletin">

                                    @error('bulletin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mx-auto align-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ajouter') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
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
                                    <h1><i class="fa fa-file-o" aria-hidden="true"></i></i>Demande d'admission</h1>
                                    <p class="mt-2">Enregistrer une demande d'admisssion</p>
                                </div>
                                <div class="col-md-6">

                                    <a class="btn btn-info float-right btn-sm" href="{{ url()->previous() }}"><i
                                            class="fa fa-reply"></i> Retour</a></li>

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
                                    <div class="tile">
                                        <div class="tile-body">
                                            <form action="{{ route('admission_requests.store') }}" method="post">
                                                <div class="form-row">

                                                    <div class="form-group col-md-12">
                                                        <label for="ine">{{ __('INE') }}</label>
                                                        <input type="text" name="ine"
                                                            class="form-control @error('ine') is-invalid @enderror" id="ine"
                                                            placeholder="ine" pattern="[0-9]{13}" required>
                                                        @error('prenom')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="prenom">{{ __('Prenom') }}</label>
                                                        <input type="text" name="prenom"
                                                            class="form-control @error('prenom') is-invalid @enderror"
                                                            id="prenom" placeholder="prenom" required>
                                                        @error('prenom')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="nom">{{ __('Nom') }}</label>
                                                        <input type="text" name="nom"
                                                            class="form-control  @error('nom') is-invalid @enderror"
                                                            id="nom" placeholder="nom" required>
                                                        @error('nom')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="dateNaissance">{{ __('Date de Naissance') }}</label>
                                                        <input type="date" name="dateNaissance" format="DD-MM-YYYY"
                                                            class="form-control @error('dateNaissance') is-invalid @enderror"
                                                            id="dateNaissance" required>
                                                        @error('dateNaissance')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                                                        <input type="text" name="lieuNaissance"
                                                            class="form-control @error('lieuNaissance') is-invalid @enderror"
                                                            id="lieuNaissance" required>
                                                        @error('lieuNaissance')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="adresse">{{ __('Adresse') }}</label>
                                                        <input type="text"
                                                            class="form-control @error('adresse') is-invalid @enderror"
                                                            id="adresse" name="adresse" required>
                                                        @error('adresse')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="tel">{{ __('TEL') }} </label>
                                                        <input type="text"
                                                            class="form-control @error('tel') is-invalid @enderror" id="tel"
                                                            name="tel" pattern="[0-9]{9}" required>

                                                        @error('tel')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" placeholder="ex@example.com" name="email">

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="genre">{{ __('genre  ') }}</label>
                                                        <select id="genre" name="genre" class="form-control" required>
                                                            <option value="Masculin">Masculin</option>
                                                            <option value="Féminin">Féminin</option>
                                                        </select>
                                                        @error('genre')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="classe">{{ __('Classe  ') }}</label>
                                                        <select id="class_id" name="class_id" class="form-control" required>
                                                            <option></option>
                                                            @foreach ($classes as $classe)
                                                                <option value="{{ $classe->id }}">
                                                                    {{ $classe->nameClass }}/option>
                                                            @endforeach
                                                        </select>
                                                        @error('genre')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="bulletin">{{ __('Bulletin') }}</label>
                                                        <input type="file"
                                                            class="form-control @error('bulletin') is-invalid @enderror"
                                                            id="bulletin" placeholder="bulletin de note" name="bulletin">

                                                        @error('bulletin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mx-auto align-content-center">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Ajouter') }}
                                                        </button>
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
