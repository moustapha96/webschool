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

                <li class="{{ is_active($activeMain, 'dashboard') }} nav-item"><a href="{{ route('home') }}"><i
                            class="icon-layers"></i><span data-i18n="" class="menu-title"> {{ Auth::user()->prenom }}
                            -- {{ Auth::user()->role }} </span></a>

                <li class="has-sub nav-item"><a><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">gestion des Classes
                        </span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('admin.filiere') }}" class="menu-item">filieres
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a href="{{ route('admin.niveau') }}"
                                class="menu-item">Niveaux
                            </a>
                        </li>
                        <li><a href="{{ route('admin.classes.index') }}" class="menu-item">classe</a>
                        </li>
                        <li><a href="{{ route('admin.classrooms.index') }}" class="menu-item">salle </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('admin.subject.index_gestion') }}" class="menu-item">Cours
                            </a>
                        </li>

                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('admin.subject.index') }}" class="menu-item">Matières
                            </a>
                        </li>

                        <li class="{{ is_active($activeMain, 'unitie') }}"><a
                                href="{{ route('admin.unity.index') }}" class="menu-item">UE</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'smester') }}"><a
                                href="{{ route('admin.semester.index') }}" class="menu-item">Semestres</a>
                        </li>
                    </ul>
                </li>




                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Gestion
                            Etudiant</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.students.liste') }}" class="menu-item">Listes</a>
                        </li>
                        <li><a href="{{ route('admin.admission_requests.index') }}" class="menu-item">Demandes
                                d'admission</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('admin.students.liste') }}" class="menu-item">Liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'notes') }}"><a href="{{ route('marks.index') }}"
                                class="menu-item">Notes
                            </a>
                        </li>

                        <li class="{{ is_active($activeMain, 'absence') }}"><a
                                href="{{ route('admin.student_attendance.index') }}" class="menu-item">Absences
                            </a>
                        </li>

                        <li class="{{ is_active($activeMain, 'réclamations') }}"><a href=""
                                class="menu-item">Réclamations
                            </a>
                        </li>

                        <li class="{{ is_active($activeMain, 'depense') }}"><a
                                href="{{ route('admin.parent.index') }}" class="menu-item">Parents
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'compte') }}"><a
                                href="{{ route('admin.student.compte') }}" class="menu-item">Comptes
                            </a>
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
                        <li class="{{ is_active($activeMain, 'book_issu') }}"><a
                                href="{{ route('admin.book_issu.index') }}" class="menu-item">Liste des emprunts </a>
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

                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Emploi
                            du temps</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('admin.schedule.index') }}" class="menu-item">liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('admin.schedule.getClasse') }}" class="menu-item">classe
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('admin.schedule.getProfesseur') }}" class="menu-item">professeur
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newSchedule') }}"><a
                                href="{{ route('admin.schedule.create') }}" class="menu-item">nouveau
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="has-sub nav-item"><a><i class="icon-user"></i><span data-i18n="" class="menu-title">
                            Utilisateurs</span></a>

                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'usersliste') }}"><a
                                href="{{ route('admin.user.index') }}" class="menu-item">Liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('admin.user.create') }}" class="menu-item">Ajouter </a>
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

                <li class="{{ is_active($activeMain, 'years') }} nav-item"><a
                        href="{{ route('academic_year') }}"><i class="icon-layers"></i><span data-i18n=""
                            class="menu-title">Année Académique</span></a>
                </li>

                <li class="has-sub nav-item"><a><i class="icon-flag"></i><span data-i18n="" class="menu-title">Dossier
                            Scolaires
                        </span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('student.liste_dossier') }}" class="menu-item">étudiants</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'depense') }}"><a href="" class="menu-item">bulletins
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has-sub nav-item"><a><i class="icon-pie-chart"></i><span data-i18n=""
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




                <li class="{{ is_active($activeMain, 'parameters') }} nav-item"><a
                        href="{{ route('admin.settings.index') }}"><i class="icon-settings"></i><span data-i18n=""
                            class="menu-title">Paramètres</span></a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
