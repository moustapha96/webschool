<!-- PRE LOADER -->
<section class="preloader">
    @php isset($logo) ? $logo = $logo." | " . get_setting('logo') : $logo = get_setting('logo')  ; @endphp
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset($logo) }}" alt="Appplication" height="100" width="100">
    </div>
</section>

<!-- MENU -->
<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" name="bouton" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="{{ route('accueil') }}" class="navbar-brand">
                <img src="{{ asset($logo) }}" width="100px" height="40px" alt="logo"></a>
        </div>


        <!-- MENU LINKS -->
        <!--<div class="collapse navbar-collapse">-->
        <div id="navbar" class="navbar-collapse collapse">

            <!--<ul class="nav navbar-nav navbar-nav-first">-->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('accueil') }}#top">Accueil</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">À propos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('accueil') }}#about">Présentation</a></li>
                        <li><a href="{{ route('accueil') }}#feature">Avantages</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('accueil') }}#team">Fonctionnalités</a></li>
                <li><a href="{{ route('admission') }}">Admission</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">En savoir plus <span class="caret"></span></a>


                    <ul class="dropdown-menu">
                        <li><a href="{{ route('accueil') }}#courses">Espaces dédiés</a></li>
                        <li><a href="{{ route('accueil') }}#testimonial">Avis de nos clients</a></li>

                    </ul>

                </li>

                <li><a href="{{ route('accueil') }}#contact">Contact</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-phone"></i>
                        @php isset($phone) ? ($phone = $phone . ' | ' . get_setting('phone')) : ($phone = get_setting('phone')); @endphp
                        {{ $phone }}
                    </a></li>
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in "></i>Connexion</a></li>
            </ul>
        </div>

    </div>
</section>
