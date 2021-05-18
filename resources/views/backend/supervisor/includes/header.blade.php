<div data-active-color="white" data-background-color="aqua-marine" data-image="app-assets/img/sidebar-bg/02.jpg"
    class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="index.html" class="logo-text float-left">
                <div class="logo-img"><img src="app-assets/img/logo.png" alt="Convex Logo" /></div><span
                    class="text align-middle">CONVEX</span>
            </a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i
                    data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;"
                class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

                <li class="{{ is_active($activeMain, 'dashboard') }} nav-item"><a href="{{ route('home') }}">
                        <i class="icon-layers"></i><span data-i18n="" class="menu-title"> {{ Auth::user()->prenom }}
                            -- {{ Auth::user()->role }}</span></a>


                <li class="has-sub nav-item"><a href="#"><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">Classes</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'listeClasses') }}"><a
                                href="{{ route('classes1.list1') }}" class="menu-item">Liste des classe</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeClassrooms') }}"><a
                                href="{{ route('classroom.index') }}" class="menu-item">Salles de classe</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeFiliere') }}"><a
                                href="{{ route('supervisor.filiere') }}" class="menu-item">Filieres</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeNiveaux') }}"><a
                                href="{{ route('supervisor.niveau') }}" class="menu-item">niveaux</a>
                        </li>
                    </ul>
                </li>

                {{-- gestion des matieres --}}
                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n="" class="menu-title">gestion
                            des cours</span></a>
                    <ul class="menu-content">

                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('supervisor.subject.index_gestion') }}" class="menu-item">cours
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('supervisor.subject.index') }}" class="menu-item">Matiéres
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a href="{{ route('supervisor.unity.index') }}"
                                class="menu-item">UE</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('supervisor.semester.index') }}" class="menu-item">Semestres</a>
                        </li>


                    </ul>
                </li>

                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Gestion
                            Etudiants</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('admission_demande.index') }}" class="menu-item">Inscriptions
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'users') }}"><a
                                href="{{ route('supervisor.students.index') }}" class="menu-item">Liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('admission_request.liste') }}" class="menu-item">admissions</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('reclaetudiants.index') }}" class="menu-item">Reclamations</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('student_attendances.index') }}" class="menu-item">Absences</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newUser') }}"><a
                                href="{{ route('abscence.index') }}" class="menu-item">Redoublants</a>
                        </li>

                    </ul>
                </li>
                {{-- gestion des professeurs --}}
                <li class="has-sub nav-item"><a><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">Professeurs</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'listeClasses') }}"><a
                                href="{{ route('teachers.index') }}" class="menu-item">Liste</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeClassrooms') }}"><a
                                href="{{ route('teachers.class_routines.index') }}" class="menu-item">Emploi du
                                temps</a>
                        </li>
                    </ul>
                </li>

                {{-- gestion des emplois du temps --}}
                <li class="has-sub nav-item"><a><i class="icon-magnet"></i><span data-i18n="" class="menu-title">Emploi
                            du temps</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('supervisor.schedule.index') }}" class="menu-item">liste
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('supervisor.schedule.getClasse') }}" class="menu-item">classe
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'accountant') }}"><a
                                href="{{ route('supervisor.schedule.getProfesseur') }}" class="menu-item">professeur
                            </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'newSchedule') }}"><a
                                href="{{ route('supervisor.schedule.create') }}" class="menu-item">nouveau
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- examen et notation --}}
                <li class="has-sub nav-item"><a><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">gestion des Notes</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'notes') }}"><a href="{{ route('supervisor.marks.index') }}"
                                class="menu-item">Notes</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeClasses') }}"><a
                                href="{{ route('supervisor.classes') }}" class="menu-item">Notes Classes</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeClasses') }}"><a
                                href="{{ route('supervisor.students') }}" class="menu-item">Notes étudiants</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'listeClassrooms') }}"><a
                                href="{{ route('supervisor.coef_barem') }}" class="menu-item">Coefficients et
                                Barèmes</a>
                        </li>
                    </ul>
                </li>
                {{-- gestion année scolaire --}}

                <li class="{{ is_active($activeMain, 'years') }} nav-item"><a
                        href="{{ route('supervisor.student.liste_dossier') }}">
                        <i class="icon-layers"></i><span data-i18n="" class="menu-title">Dossier scolaire</span></a>
                </li>

                {{-- notifications --}}

                <li class="has-sub nav-item"><a><i class="icon-pie-chart"></i><span data-i18n=""
                            class="menu-title">Messagerie</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('messagesSupervisor.index') }}" class="menu-item">Messages
                                <span class="tag badge badge-pill badge-success white mt-1">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
