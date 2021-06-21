

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


    <li class="nav-item menu-open">
        <a href="" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Gestion des Classes
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('supervisor.filiere') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>filieres</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.niveau') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Niveaux</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.classe.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Classes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('classroom.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Salles</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.subject.index_gestion') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cours</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.subject.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Matieres</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.unity.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UE</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.semester.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semestres</p>
                </a>
            </li>

        </ul>
    </li>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Gestion des Etudiants
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('supervisor.students.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admission_request.liste') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Demande d'admission</p>
                </a>
            </li>

            <li class="nav-item">
                <a  href="{{ route('admission_demande.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inscriptions</p>
                </a>
            </li>

            <li class="nav-item">
                <a  href="{{ route('student_attendances.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Absences</p>
                </a>
            </li>
            <li class="nav-item">
                <a  href="{{ route('abscence.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Redoublants</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('reclaetudiants.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Réclamations</p>
                </a>
            </li>


        </ul>
    </li>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('supervisor.schedule.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.schedule.getClasse') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>classes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.schedule.getProfesseur') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>professeurs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.schedule.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>nouveau</p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                professeurs
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('teacher.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('teachers.class_routines.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>schédule</p>
                </a>
            </li>


        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                gestion des Notes
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('supervisor.marks.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.classes') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notes classes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.students') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notes étudiants</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.coef_barem') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Coef & barem</p>
                </a>
            </li>


        </ul>
    </li>


    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Dossier Scolaires
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('supervisor.student.liste_dossier') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>dossier</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>bulletins</p>
                </a>
            </li>

        </ul>
    </li>

    <li class="nav-header">Notification</li>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
                Messagerie
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{ auth()->user()->unreadNotifications->count() }} </span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('messagesSupervisor.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Msg

                    </p>
                </a>
            </li>

        </ul>
    </li>
</ul>
