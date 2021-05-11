@extends('backend.layouts.main')


@section('styles')

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
                                    <h4 class="card-title">Modifier un profil utilisateur</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-info float-right btn-sm"
                                        role="button">Liste des utilisateurs</a>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                    <div class="card-body collapse show">
                        <div class="card-block card-dashboard">
                            <form method="post" class="needs-validation" novalidate
                                action="{{ route('user.photo', $user->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">


                                    <div class="col-md-4">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="avatar" class="btn text-center">
                                            <img id="user_avatar" src="@if (file_exists($user->avatar)) {{ asset($user->avatar) }} @else {{ asset(get_setting('default_avatar')) }} @endif"
                                                style="  height: 200px;width: 200px ; border-radius: 90%">
                                        </label>
                                        <input type="file" id="avatar" name="avatar"
                                            style="visibility: hidden;border-radius: 50% "
                                            onchange="load_image(this, 'user_avatar');" accept=".jpg,.jpeg,.png">


                                    </div>
                                    <div class="col-md-4">
                                    </div>




                                </div>


                                <hr>
                                <p class="text-center">
                                    <input type="submit" class="btn btn-info "
                                        value="{{ __('Mettre à jour photo profil') }}">
                                </p>
                            </form>
                            <hr>

                            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                                @csrf
                                @method('POST')

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="prenom">{{ __('Prénoms') }}</label>
                                        <input type="text" name="prenom"
                                            class="form-control @error('prenom') is-invalid @enderror" id="prenom"
                                            placeholder="Prénoms" value="{{ $user->prenom }}" required>
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nom">{{ __('Nom') }}</label>
                                        <input type="text" name="nom"
                                            class="form-control  @error('nom') is-invalid @enderror" id="nom"
                                            placeholder="Nom de famille" value="{{ $user->nom }}" required>
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="dateNaissance">{{ __('Date de Naissance') }}</label>
                                        <input type="date" name="dateNaissance" format="DD-MM-YYYY"
                                            class="form-control @error('dateNaissance') is-invalid @enderror"
                                            id="dateNaissance" required value="{{ $user->dateNaissance }}">
                                        @error('dateNaissance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lieuNaissance">{{ __('Lieu de Naissance') }}</label>
                                        <input type="text" name="lieuNaissance"
                                            class="form-control @error('lieuNaissance') is-invalid @enderror"
                                            id="lieuNaissance" required value="{{ $user->lieuNaissance }}"
                                            placeholder="    Lieu de naissance">
                                        @error('lieuNaissance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="adresse">{{ __('Adresse') }}</label>
                                        <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                            id="adresse" name="adresse" value="{{ $user->adresse }}" required
                                            placeholder=" Adresse">
                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tel">{{ __('N° de téléphone') }} </label>
                                        <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel"
                                            name="tel" value="{{ $user->tel }}" required placeholder=" N° de téléphone">

                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>




                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">{{ __('Adresse E-Mail') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ $user->email }}"
                                            placeholder="exemple@webschool.com">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="genre">{{ __('Genre') }} </label>
                                        @if ($user->genre == 'M.')
                                            <select id="genre" name="genre" class="form-control" required>
                                                <option value="M." selected>M.</option>
                                                <option value="Mlle">Mlle</option>
                                                <option value="Mme">Mme</option>
                                            </select>
                                        @elseif ($user->genre == 'Mlle')
                                            <select id="genre" name="genre" class="form-control" required>
                                                <option value="M.">M.</option>
                                                <option value="Mlle" selected>Mlle</option>
                                                <option value="Mme">Mme</option>
                                            </select>
                                        @else
                                            <select id="genre" name="genre" class="form-control" required>
                                                <option value="M.">M.</option>
                                                <option value="Mlle" >Mlle</option>
                                                <option value="Mme" selected>Mme</option>
                                            </select>

                                        @endif
                                        @error('genre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="status">{{ __('Statut du compte') }}</label>

                                        <select id="status" name="status" class="form-control" required>
                                            <option value="1" selected {{ $user->status == 1 ? 'selected' : '' }}>Activé
                                            </option>
                                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Désactivé
                                            </option>
                                        </select>



                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <div class="form-row">

                                    <div class="form-group col-12 m-*-auto">
                                        <button type="submit" class="pull-right btn btn-info">
                                            <i class="fa fa-sign-in fa-lg fa-fw"></i>
                                            {{ __('Mettre à jour ') }}
                                        </button>
                                    </div>
                                </div>



                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')



@endsection
