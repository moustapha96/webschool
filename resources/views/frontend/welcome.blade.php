@extends('frontend.main')


@section('seo')

@endsection


@section('main')


    <!-- HOME -->
    <section id="home">
        <div class="row">

            <div id="message" class="col-md-12 col-sm-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <div id="msgSubmit" class="h3 text-center hidden"> Message envoyé avec succès !</div>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        <div id="msgSubmit" class="h3 text-center hidden"> Message n'est pas envoyé , Veuillez réessayer
                            svp</div>
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
            <div class="owl-carousel owl-theme home-slider">
                <div class="item item-first">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>WebSchool devient MyScol</h1>
                                <a href="https://sunucode.com/" class="section-btn btn btn-default smoothScroll">Découvrir
                                    MyScol</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>On change de nom !</h1>
                                <h2>WebSchool devient MyScol</h2>
                                <h2>Avec beaucoup plus des nouveautés</h2>
                                <a href="{{ route('accueil') }}"
                                    class="section-btn btn btn-default smoothScroll">Découvrir MyScol</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-third">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-6 col-sm-12">
                                <h1>Logiciel de gestion scolaire</h1>
                                <h2>Application entièrement paramétrable selon vos préférences.</h2>
                                <a href="{{ route('accueil') }}#contact"
                                    class="section-btn btn btn-default smoothScroll">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-12">
                    <div class="about-info">
                        <h3>WebSchool est une application web de gestion scolaire. WebSchool met en relation les différents
                            acteurs de l’établissement :</h3><br>

                        <figure>
                            <span><i class="fa fa-home"></i></span>
                            <figcaption>
                                <h4>Administration</h4>
                                <div class="col-md-10">
                                    <p>WebSchool permet la gestion d'école en tenant compte de ses critères spécifiques. Ce
                                        système de gestion de vie scolaire réduit le travail administratif des écoles et des
                                        enseignants.</p>
                                </div>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-graduation-cap"></i></span>
                            <figcaption>
                                <h4>Enseignants</h4>
                                <div class="col-md-10">
                                    <p>WebSchool permet la gestion des enseignants, elle fournit une interface pour
                                        consulter les emplois du temps, gérer les absences, enregistrer les résultats des
                                        élèves et le cahier de texte.</p>
                                </div>
                            </figcaption>
                        </figure>

                        <figure>
                            <span><i class="fa fa-users"></i></span>
                            <figcaption>
                                <h4>Parents-Elèves</h4>
                                <div class="col-md-10">
                                    <p>Cette application de gestion des inscriptions est une solution très appréciée par la
                                        communauté parentale. Nous assurons le suivi scolaire de leurs enfants tout en
                                        veillant au respect de la confidentialité de leurs données personnelles.</p>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
                    <div class="entry-form">
                        <h2 style="font-size: 23px; padding-top: 20px;">Pour en savoir plus</h2>
                        <h2 style="font-size: 23px;">Consulter notre nouveau site !</h2>


                        <a href="http://sunucode.com/">
                            <button class="submit-btn form-control" id="form-submit"
                                style="background:#3f98d0;color:white;">sunucode.com</button></a>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <!-- FEATURE -->
    <section id="feature">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h3>Avantages</h3>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="feature-thumb">
                        <span>01</span>
                        <h3>Inscription en ligne</h3>
                        <ul>
                            <li>Application web de gestion d'inscription dédiée pour les écoles, collèges et lycées</li>
                            <li> Eviter les impressions papier</li>
                            <li>Gestion des demandes d'inscription de manière chronologique</li>
                            <li>Information, en temps réel, de suivi des demandes (enregistrement, prise en charge,
                                acceptation,...)</li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="feature-thumb">
                        <span>02</span>

                        <h3>Vie scolaire</h3>
                        <ul>
                            <li>Gestion d'école plus rapide et plus intelligente</li>
                            <li>Meilleure gestion des enseignants et des élèves</li>
                            <li>Consultation des emplois du temps </li>
                            <li>Rattachement direct à votre site internet</li>
                            <li>Personalisable avec le logo de la structure</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="feature-thumb">
                        <span>03</span>

                        <h3>Economie et rentabilité</h3>
                        <ul>
                            <li>Interface simple à utiliser qui ne nécessite aucune formation</li>
                            <li>Même application pour tous les établissements scolaires</li>
                            <li>Paiement par PayPal</li>
                            <li>Confidentialité de vos données bancaires</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- TEAM -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h3>Fonctionnalités</h3>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/author-image1.png') }}"
                                            class="img-responsive" alt="Tableau de bord administration">
                                    </div>
                                    <div class="team-info">
                                        <h4>Tableau de bord administratif</h4>
                                    </div>
                                    <ul>
                                        <li>Réduire le temps, les coûts et la complexité de la planification des tâches
                                            administratives</li>
                                        <li>Tableau de bord avancé avec plusieurs excellentes statistiques</li>


                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/absence.png') }}" class="img-responsive"
                                            alt="Absence">
                                    </div>
                                    <div class="team-info">
                                        <h4>Gestion des absences</h4>
                                    </div>
                                    <ul>
                                        <li>WebSchool permet la transmission des absences en temps réel </li>
                                        <li>Communication directe avec l'administration, les enseignants et les parents</li>

                                    </ul>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/message.png') }}" class="img-responsive"
                                            alt="Messagerie interne">
                                    </div>

                                    <div class="team-info">
                                        <h4>Messagerie interne</h4>
                                    </div>
                                    <ul>
                                        <li>Canal de communication privé pour les écoles, les parents, les enseignants et
                                            les étudiants</li>
                                        <li>Suivi de la scolarité et du comportement scolaire de leurs enfants</li>
                                    </ul>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/author-image4.png') }}"
                                            class="img-responsive" alt="Notes">
                                    </div>

                                    <div class="team-info">
                                        <h4>Notes</h4>
                                    </div>
                                    <ul>
                                        <li>Ecran principale de consultation des notes et base de données sécurisée</li>
                                        <li>Calcul automatique des moyennes (par classe, par matière, générale)</li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/parent.png') }}" class="img-responsive"
                                            alt="Tableau de bord parent">
                                    </div>



                                    <div class="team-info">
                                        <h4>Tableau de bord parent</h4>
                                    </div>
                                    <ul>
                                        <li>Tableau de bord simple et clair facilite l'inscription des élèves dans les
                                            écoles. </li>
                                        <li>Suivi des résultats et de comportement de son enfant en temps réel</li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/inscritparent.png') }}"
                                            class="img-responsive" alt="Inscription parent">
                                    </div>
                                    <div class="team-info">
                                        <h4>Inscription parent</h4>
                                    </div>
                                    <ul>
                                        <li>WebSchool garantie une inscription gratuite des parents en mettant en valeur la
                                            sécurité de données personnelles. </li>
                                        <li>Contrôle à distance de la vie scolaire des enfants</li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/ajout.png') }}" class="img-responsive"
                                            alt="Ajout élève">
                                    </div>
                                    <div class="team-info">
                                        <h4>Ajout élèves</h4>
                                    </div>
                                    <ul>
                                        <li>Dialogue direct entre les parents et l'école lors de l'ajout des élèves en
                                            ligne.</li>
                                        <li>Simplifier et rationaliser toutes les tâches de l'inscription de l'élève.</li>
                                    </ul>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="team-thumb">
                                    <div class="team-image">
                                        <img src="{{ asset('page_accueille/images/status.png') }}" class="img-responsive"
                                            alt="Validation inscription">
                                    </div>
                                    <div class="team-info">
                                        <h4>Validation des inscriptions</h4>
                                    </div>
                                    <ul>
                                        <li>Suivi de toutes les étapes d'inscription dans l'école, collège et lycée en temps
                                            réel</li>
                                        <li>Système d'éducation efficace qui garantie la sécurité totale des données</li>


                                    </ul>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Courses -->
    <section id="courses">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h3>Commencer votre année scolaire avec WebSchool</h3>
                    </div>

                    <div class="owl-carousel owl-theme owl-courses">

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="{{ asset('page_accueille/images/courses-image3.jpg') }}"
                                                class="img-responsive" alt="Espace administration">
                                        </div>

                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Espace administration</a></h3>
                                        <p>WebSchool est une application de gestion d'école sécurisée, simple, pratique et
                                            efficace. Avec ce logiciel de gestion d'inscription, l’administration de l’école
                                            serait dans une telle position en ce qui concerne le partage d’informations et
                                            la circulation des données. Ce système de gestion de vie scolaire, permet aux
                                            activités quotidiennes de l'institution de se dérouler de manière plus fluide.
                                            Notre solution de gestion des inscriptions, vous aide à faciliter l’échange
                                            entre les différents acteurs de l’établissement pour aider au mieux les élèves.
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="{{ asset('page_accueille/images/parents.jpg') }}"
                                                class="img-responsive" alt="Parents">
                                        </div>

                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Espace parents</a></h3>
                                        <p>La réussite scolaire passe par une bonne communication avec les parents.
                                            L'application de gestions des inscriptions, vous aide à fluidifier les
                                            informations de l’inscription à la scolarité : suivi pédagogique et financier,
                                            consultation des notes et du cahier de texte. Avec l'aide d'un tel logiciel de
                                            gestion de vie scolaire, le temps est révolu où les écoles devraient se mettre
                                            en contact avec les parents pour les informer de l'état des progrès de leur
                                            enfant.</p>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="{{ asset('page_accueille/images/courses-image5.jpg') }}"
                                                class="img-responsive" alt="Espace enseignant">
                                        </div>

                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Espace enseignants</a></h3>
                                        <p>WebSchool vous offre un logiciel efficace pour l'analyse, la planification et le
                                            suivi du secteur de l'éducation. Notre application de gestion de vie scolaire,
                                            vous facilite la saisie des notes et des bulletins de manière simple et
                                            pratique. Ce système de gestion des inscriptions, permet également de saisir en
                                            temps réel les absences des élèves et facilite la communication entre les
                                            différents acteurs de l’établissement (administration, collègues, parents).</p>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="courses-thumb">
                                    <div class="courses-top">
                                        <div class="courses-image">
                                            <img src="{{ asset('page_accueille/images/courses-image4.jpg') }}"
                                                class="img-responsive" alt="Espace élève">
                                        </div>

                                    </div>

                                    <div class="courses-detail">
                                        <h3><a href="#">Espace élèves</a></h3>
                                        <p>L'inscription des élèves en ligne est maintenant accessible et individuelle avec
                                            WebSchool. Ce système de gestion d'école permet d'approfondir l'apprentissage
                                            des étudiants avec la technologie. Notre solution de gestion des inscriptions,
                                            vous permet également de recevoir les bulletins périodiques, en général
                                            mensuels, les bulletins de fin de trimestre incluent le résultat de conseil de
                                            classe.</p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Avis des clients -->
    <section id="testimonial">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h3>Avis de nos clients</h3>
                    </div>

                    <div class="owl-carousel owl-theme owl-client">
                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="{{ asset('page_accueille/images/educetic.png') }}" alt="Educ'etic">
                                </div>
                                <div class="tst-author">
                                    <h4>Educ'Etic</h4>

                                </div>

                                <p>“Très bonne application. Elle Permet de gagner de temps considérable. Application de
                                    gestion très intuitive et facile à utiliser.“

                                    Directeur de Groupe Scolaire Educ'Etic</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="{{ asset('page_accueille/images/groupescolaire.png') }}"
                                        alt="Groupe scolaire">
                                </div>
                                <div class="tst-author">
                                    <h4>G.S.P.B</h4>

                                </div>

                                <p>“WebSchool est un système de gestion trés efficace, la gestion des inscriptions est
                                    maintenant rapide et intelligente. Cette application nous permet de bien gagner le temps
                                    et améliorer la gestion de notre école.“

                                    Directeur de G.S.P.B.</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="item">
                                <div class="tst-image">
                                    <img src="{{ asset('page_accueille/images/lumiere.png') }}"
                                        alt="La lumiére du savoir">
                                </div>
                                <div class="tst-author">
                                    <h4>La lumière du savoir</h4>

                                </div>

                                <p>“Notre gestion des demandes d’inscription était contraignante avant d’utiliser WebSchool.
                                    Grâce à cette application, nous avons sensiblement réduit le temps de traitement des
                                    demandes, Cela nous prend 5 à 10 fois moins de temps pour retrouver un dossier d’élève
                                    !“

                                    ALOUI Amor, Directeur de Groupe Scolaire La Lumière du Savoir</p>
                                <div class="tst-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- CONTACT -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="section-title">
                        <h2>Vous souhaitez en savoir d'avantage sur la solution WebSchool ou la découvrir sans engagement ?
                        </h2>
                        <h3 style="color:white">Merci de bien vouloir remplir le formulaire ci-dessous</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="message" class="col-md-12 col-sm-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <div id="msgSubmit" class="h3 text-center hidden"> Message envoyé avec succès !</div>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <div id="msgSubmit" class="h3 text-center hidden"> Message n'est pas envoyé , Veuillez réessayer
                                svp</div>
                            {{ Session::get('error') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 col-sm-12">

                    <form action="{{ route('contact_envoie') }}" method="post">
                        @csrf
                        <div class="form-row">


                            <div class="form-group col-md-12">
                                <label for="prenom">{{ __('Prenom') }}</label>
                                <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror"
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
                                    placeholder="nom" required>
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group col-md-12">
                                <label for="adresse">{{ __('Adresse') }}</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                    name="adresse" required>
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="ex@example.com" name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">{{ __('Votre Message') }}</label>
                                <textarea rows="5" class="form-control @error('message') is-invalid @enderror" id="message"
                                    placeholder="message ..." name="message"></textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="mx-auto align-content-center">
                                <div style="padding-top:20px;padding:3%">
                                    <p>En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées
                                        dans le cadre de la demande de devis et de la relation commerciale qui peut en
                                        découler.</p>
                                    <p>Pour connaitre et exercer vos droits, notamment de retrait de votre consentement à
                                        l'utilisation des données collectées par ce formulaire, veuillez consulter notre
                                    </p><a href="politique.html" target="_blank" class="politiqueconf"> politique de
                                        confidentialité</a>

                                </div>
                                <button type="submit" class="btn  btn-container btn-block btn-primary">
                                    {{ __('Contactez-Nous') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.297753659938!2d2.303943115903317!3d48.87160010773017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fc3f96c7313%3A0x3ee0018bb39bb8b3!2s49+Rue+de+Ponthieu%2C+75008+Paris!5e0!3m2!1sfr!2sfr!4v1541775396118"
                        width="100%" height="450" frameborder="0" style="border:0"></iframe>
                </div>

            </div>
        </div>
    </section>

@endsection
