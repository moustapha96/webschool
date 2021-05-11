<div data-active-color="white" data-background-color="aqua-marine" data-image="app-assets/img/sidebar-bg/02.jpg"
    class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix"><a class="logo-text float-left">
                <div class="logo-img"><img src="app-assets/img/logo.png" /></div><span
                    class="text align-middle">COVEX</span>
            </a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i
                    data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;"
                class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

                <li class="{{ is_active($activeMain, 'dashboard') }} nav-item"><a href="cards.html"><i
                            class="icon-layers"></i><span data-i18n="" class="menu-title"> {{ Auth::user()->prenom }} -- {{ Auth::user()->role }} </span></a>

                <li class="has-sub nav-item"><a><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">Classes
                        </span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.classes.index') }}" class="menu-item">Liste des Classes</a>
                        </li>
                        <li><a href="{{ route('admin.classrooms.index') }}" class="menu-item">salle de classe</a>
                        </li>

                    </ul>
                </li>


                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Gestion
                            Etud</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('admin.students.liste') }}" class="menu-item">Liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('admission_request.liste') }}" class="menu-item">admission </a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n=""
                            class="menu-title">Bibliothéque</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'categorie') }}"><a
                                href="{{ route('admin.categories') }}" class="menu-item">catégorie
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'users') }}"><a href="{{ route('books.index') }}"
                                class="menu-item">Livres disponibles
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('book_issu.index') }}" class="menu-item">Liste des emprunts </a>
                        </li>

                    </ul>
                </li>
                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n=""
                            class="menu-title">Comptable</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('accountant.index') }}" class="menu-item">utilisateur
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'depense') }}"><a href="" class="menu-item">dépenses
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'recette') }}"><a href="" class="menu-item">recettes
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has-sub nav-item"><a><i class="icon-user"></i><span data-i18n="" class="menu-title">
                            Utilisateurs</span></a>

                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'users') }}"><a class="menu-item">Liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a class="menu-item">Ajouter </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'librian') }}"><a href="{{ route('librian.index') }}"
                                class="menu-item">
                                Bibliothécaires</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'supervisor') }}"><a
                                href="{{ route('supervisor.index') }}" class="menu-item">
                                Responsables Péda</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('accountant.index') }}" class="menu-item">
                                Comptables</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'teacher') }}"><a href="{{ route('teacher.index') }}"
                                class="menu-item">
                                Professeurs</a>
                        </li>

                    </ul>
                </li>

                <li class="{{ is_active($activeMain, 'years') }} nav-item"><a><i class="icon-layers"></i><span
                            data-i18n="" class="menu-title">Année Académique</span></a>
                </li>

                <li class="has-sub nav-item"><a><i class="icon-grid"></i><span data-i18n=""
                            class="menu-title">Etudiants</span></a>
                    <ul class="menu-content">
                        <li><a href="regular-table.html" class="menu-item">Listes par classe</a>
                        </li>
                        <li><a href="extended-table.html" class="menu-item">Demandes d'admission</a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub nav-item"><a><i class="icon-notebook"></i><span data-i18n=""
                            class="menu-title">Bibliothèque</span></a>
                    <ul class="menu-content">
                        <li><a href="dt-basic-initialization.html" class="menu-item">Livres disponibles</a>
                        </li>
                        <li><a href="dt-advanced-initialization.html" class="menu-item">Liste des emprunts</a>
                        </li>

                    </ul>
                </li>


                <li class="has-sub nav-item"><a><i class="icon-user"></i><span data-i18n="" class="menu-title">Dossier
                            Scolaires
                        </span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('student.liste_dossier') }}" class="menu-item">étudiants</a>
                        </li>


                    </ul>
                </li>




                <li class="has-sub nav-item"><a href="#"><i class="icon-pie-chart"></i><span data-i18n=""
                            class="menu-title">Messagerie</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('notificationsAdmin.show') }}" class="menu-item">Notifications
                                <span class="tag badge badge-pill badge-success white mt-1">
                                    {{ auth()->user()->unreadNotifications->count() }} notification(s)
                                </span>
                            </a>
                        </li>
                        <li><a href="{{ route('messagesAdmin.index') }}" class="menu-item">Messagerie</a>
                        </li>
                        <li><a href="{{ route('admin.contact.liste') }}" class="menu-item">Contact</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ is_active($activeMain, 'academic_year') }} nav-item"><a
                        href="{{ route('academic_year') }}"><i class="icon-years"></i><span data-i18n=""
                            class="menu-title">année académique</span></a>
                </li>

                <li class="{{ is_active($activeMain, 'parameters') }} nav-item"><a
                        href="{{ route('admin.settings.index') }}"><i class="icon-settings"></i><span data-i18n=""
                            class="menu-title">Paramètres</span></a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
