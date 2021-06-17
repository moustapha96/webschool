@extends('backend.layouts.template')


@section('title')
    <h4 class="card-title">Paramètres de l'application</h4>
    <hr>

@endsection
@section('option')

@endsection
@section('option-panel')

@endsection
@section('data')
    <div class="row match-height">

        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h1 class="card-title">Paramètres de l'application</h1>

                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="nav-vertical">
                            <ul class="nav nav-tabs nav-left">
                                <li class="nav-item">
                                    <a class="nav-link active" id="baseVerticalLeft2-tab1" data-toggle="tab"
                                        aria-controls="tabVerticalLeft21" href="#tabVerticalLeft21" aria-expanded="true"><i
                                            class="fa fa-building"></i>
                                        Etablissement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="baseVerticalLeft2-tab2" data-toggle="tab"
                                        aria-controls="tabVerticalLeft22" href="#tabVerticalLeft22" aria-expanded="false"><i
                                            class="fa fa-globe"></i> Application</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="baseVerticalLeft2-tab3" data-toggle="tab"
                                        aria-controls="tabVerticalLeft23" href="#tabVerticalLeft23" aria-expanded="false"><i
                                            class="fa fa-envelope"></i> Messagerie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="baseVerticalLeft2-tab4" data-toggle="tab"
                                        aria-controls="tabVerticalLeft24" href="#tabVerticalLeft24" aria-expanded="false"><i
                                            class="fa fa-image"></i> Images</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1">
                                <div role="tabpanel" class="tab-pane active" id="tabVerticalLeft21" aria-expanded="true"
                                    aria-labelledby="baseVerticalLeft2-tab1">
                                    <form method="post" class="needs-validation" novalidate autocomplete="off"
                                        action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="col-md-5">
                                                <div class="position-relative form-group"><label for="school_name"
                                                        class="">Nom de
                                                        l'établissement</label><input name="school_name" id="school_name"
                                                        placeholder="Nom de l'étanlissement" type="text"
                                                        class="form-control"
                                                        value="{{ old('school_name', get_setting('school_name')) }}"
                                                        required=""></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="address"
                                                        class="">Adresse de
                                                        l'établissement</label>
                                                    <input name="address" id="address"
                                                        placeholder="Adresse de l'établissement" type="text"
                                                        class="form-control"
                                                        value="{{ old('address', get_setting('address')) }}" required=""
                                                        maxlength="200">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="academic_year" class="">Année académique
                                                    {{ create_option('academic_years', 'id', 'session', get_setting('academic_year')) }}</label>
                                                <select class="form-control" name="academic_year" required>
                                                    {{ create_option('academic_years', 'year', 'session', get_setting('academic_year')) }}
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="phone1" class="">N° de
                                                        téléphone
                                                        (1)</label><input name="phone1" id="phone1" type="tel"
                                                        class="form-control" required=""
                                                        value="{{ old('phone1', get_setting('phone1')) }}"
                                                        placeholder="N° de téléphone"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="phone2" class="">N° de
                                                        téléphone
                                                        (2)</label><input name="phone2" id="phone2" type="tel"
                                                        class="form-control" required=""
                                                        value="{{ old('phone2', get_setting('phone2')) }}"
                                                        placeholder="N° de téléphone"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="email"
                                                        class="">Email</label><input name="email" id="email" type="email"
                                                        class="form-control" required=""
                                                        value="{{ old('email', get_setting('email')) }}"
                                                        placeholder="Adresse Email"></div>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                      <div class="position-relative form-group"><label for="currency" class="">Devise</label><input name="currency" id="currency" type="text" class="form-control" required="" value="{{ old('currency', get_setting('currency')) }}" placeholder="Devise"></div>
                                                    </div> --}}
                                        </div>

                                        <div class="form-row">


                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="status"
                                                        class="">Statut de l'école</label>

                                                    <select class="form-control select2" id="status" type=""
                                                        class="form-control" required=""
                                                        value="{{ old('status', get_setting('status')) }}">
                                                        <option value="privé"
                                                            {{ get_setting('status') == 'privé' ? 'selected' : '' }}>
                                                            Privé</option>
                                                        <option value="pubic"
                                                            {{ get_setting('status') == 'public' ? 'selected' : '' }}>
                                                            Public</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="language"
                                                        class="">Langue</label>
                                                    <select class="form-control select2" id="language" name="language"
                                                        required>
                                                        <option value="fr">Français</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group">
                                                    <label for="currency" class="">Devise</label>
                                                    <input name="currency" id="currency" type="text" class="form-control"
                                                        required=""
                                                        value="{{ old('currency', get_setting('currency')) }}"
                                                        placeholder="Devise">


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="timezone"
                                                        class="">Fuseau horaire</label>
                                                    <select class="form-control select2" id="timezone" name="timezone"
                                                        required>
                                                        <option value="">Sélectionner un fuseau</option>
                                                        {{ create_timezone_option(get_setting('timezone')) }}
                                                    </select>
                                                </div>
                                            </div>

                                        </div>



                                        <hr>
                                        <p class="text-center">
                                            <input type="submit" name="" value="Mettre à jour" class="mt-2 btn btn-info">
                                        </p>

                                    </form>
                                </div>
                                <div class="tab-pane" id="tabVerticalLeft22" aria-labelledby="baseVerticalLeft2-tab2">
                                    <form method="post" class="needs-validation" novalidate autocomplete="off"
                                        action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row">


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Nom de l\'application' }}</label>
                                                    <input type="text" class="form-control" name="app_name"
                                                        value="{{ get_setting('app_name') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Titre de l\'application' }}</label>
                                                    <input type="text" class="form-control" name="site_title"
                                                        value="{{ get_setting('site_title') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Site Web' }}</label>
                                                    <input type="url" class="form-control" required="" name="website"
                                                        value="{{ get_setting('website') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Slogan de l\'application' }}</label>
                                                    <input type="text" class="form-control" required="" name="app_slogan"
                                                        value="{{ get_setting('app_slogan') }}">
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label
                                                        class="control-label">{{ 'Couleur du menu primaire (Gauche)' }}</label>
                                                    <input type="text" class="jscolor form-control" required=""
                                                        autocomplete="off" name="sidebarbgcolor"
                                                        value="{{ get_setting('sidebarbgcolor') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Couleur de l\'entête' }}</label>
                                                    <input type="text" class="form-control jscolor" autocomplete="off"
                                                        name="headerbgcolor" value="{{ get_setting('headerbgcolor') }}"
                                                        required="">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>


                                        <p class="text-center">
                                            <input type="submit" class="btn btn-info " value="{{ 'Mettre à jour' }}">
                                        </p>


                                    </form>
                                </div>
                                <div class="tab-pane" id="tabVerticalLeft23" aria-labelledby="baseVerticalLeft2-tab3">
                                    <form method="post" class="needs-validation" novalidate autocomplete="off"
                                        action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row">


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Email d\'envoi' }}</label>
                                                    <input type="text" class="form-control" name="from_email"
                                                        value="{{ get_setting('from_email') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Nom d\'envoi' }}</label>
                                                    <input type="text" class="form-control" name="from_name"
                                                        value="{{ get_setting('from_name') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'SMTP Host' }}</label>
                                                    <input type="text" class="form-control" required="" name="smtp_host"
                                                        value="{{ get_setting('smtp_host') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'SMTP Port' }}</label>
                                                    <input type="text" class="form-control" required="" name="smtp_port"
                                                        value="{{ get_setting('smtp_port') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'SMTP Encryption' }}</label>
                                                    <select class="form-control" name="smtp_encryption" required="">
                                                        <option value="ssl"
                                                            {{ get_setting('smtp_encryption') == 'ssl' ? 'selected' : '' }}>
                                                            {{ 'SSL' }}</option>
                                                        <option value="tls"
                                                            {{ get_setting('smtp_encryption') == 'tls' ? 'selected' : '' }}>
                                                            {{ 'TLS' }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Nom d\'utilisateur SMTP' }}</label>
                                                    <input type="text" class="form-control" required="" autocomplete="off"
                                                        name="smtp_username" value="{{ get_setting('smtp_username') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{ 'Mot de passe SMTP' }}</label>
                                                    <input type="password" class="form-control smtp" autocomplete="off"
                                                        name="smtp_password" value="{{ get_setting('smtp_password') }}"
                                                        required="">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>


                                        <p class="text-center">
                                            <input type="submit" class="btn btn-info " value="{{ 'Mettre à jour' }}">
                                        </p>


                                    </form>
                                </div>

                                <div class="tab-pane" id="tabVerticalLeft24" aria-labelledby="baseVerticalLeft2-tab4">
                                    <form method="post" class="needs-validation" novalidate
                                        action="{{ route('settings.update_logo') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-row">

                                            <div class="col-md-3">
                                                <label for="logo" class="btn text-center"
                                                    style="color: black; float: center; width: 100%;">
                                                    <img id="logosite" src="@if (file_exists(get_setting('logo'))) {{ asset(get_setting('logo')) }} @else {{ asset('images/settings/logo.png') }} @endif" height="210px" width="100%"><br>
                                                    {{ __('Logo') }}
                                                </label>
                                                <input type="file" id="logo" name="logo" style="visibility: hidden;"
                                                    onchange="load_image(this, 'logosite');" accept=".jpg,.jpeg,.png">


                                            </div>
                                            <div class="col-md-3">
                                                <label for="favicon" class="btn text-center"
                                                    style="color: black; float: center; width: 100%;">
                                                    <img id="faviconsite" src="@if (file_exists(get_setting('favicon'))) {{ asset(get_setting('favicon')) }} @else {{ asset('images/settings/favicon.png') }} @endif" height="210px"
                                                        width="100%"><br>{{ __('Favicon') }}
                                                </label>
                                                <input type="file" id="favicon" name="favicon" style="visibility: hidden;"
                                                    onchange="load_image(this, 'faviconsite');" accept=".jpg,.jpeg,.png">

                                            </div>

                                            <div class="col-md-3">
                                                <label for="default_avatar" class="btn text-center"
                                                    style="color: black; float: center; width: 100%;">
                                                    <img id="avatar" src="@if (file_exists(get_setting('default_avatar'))) {{ asset(get_setting('default_avatar')) }} @else {{ asset('images/settings/avatar.png') }} @endif" height="210px"
                                                        width="100%"><br>{{ __('Avatar') }}
                                                </label>
                                                <input type="file" id="default_avatar" name="default_avatar"
                                                    style="visibility: hidden;" onchange="load_image(this, 'avatar');"
                                                    accept=".jpg,.jpeg,.png">
                                            </div>


                                            <div class="col-md-3">
                                                <label for="default_bg" class="btn text-center"
                                                    style="color: black; float: center; width: 100%;">
                                                    <img id="bg" src="@if (file_exists(get_setting('default_bg'))) {{ asset(get_setting('default_bg')) }} @else {{ asset('images/settings/bg.png') }} @endif" height="210px"
                                                        width="100%"><br>{{ __('Couverture') }}
                                                </label>
                                                <input type="file" id="default_bg" name="default_bg"
                                                    style="visibility: hidden;" onchange="load_image(this, 'bg');"
                                                    accept=".jpg,.jpeg,.png">
                                            </div>

                                        </div>


                                        <hr>
                                        <p class="text-center">
                                            <input type="submit" class="btn btn-info " value="{{ __('Mettre à jour') }}">
                                        </p>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
