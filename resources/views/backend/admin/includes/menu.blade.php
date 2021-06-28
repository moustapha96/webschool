<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a href="{{ route('academic_year') }}" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
                Année académique
            </p>
        </a>
    </li>
    <li class="nav-item ">
        <a href="" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Gestion des Classes
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.filiere') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>filieres</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.niveau') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Niveaux</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.classes.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Classes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.classrooms.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Salles</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.subject.index_gestion') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cours</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.subject.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Matieres</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.unity.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UE</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.semester.index') }}" class="nav-link">
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
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.students.liste') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.admission_requests.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Demande d'admission</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('marks.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.student_attendance.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Absences</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Réclamations</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.parent.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Parents </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.student.compte') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comptes</p>
                </a>
            </li>

        </ul>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
                Bibliothéque
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.categories') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Catégories</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('books.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Livres</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.book_issu.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Livres empruntés</p>
                </a>
            </li>

        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Compta
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('accountant.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Utilisateur</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>dépenses</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>recette</p>
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
                <a href="{{ route('admin.schedule.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.schedule.getClasse') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>classes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.schedule.getProfesseur') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>professeurs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.schedule.create') }}" class="nav-link">
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
                Utilisateurs
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nouveau</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('librian.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bibliothécaires</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('supervisor.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Responsable Peda</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('accountant.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comptables</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('teacher.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Professeurs</p>
                </a>
            </li>
        </ul>
    </li>
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
                <a href="{{ route('notificationsAdmin.show') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Msg

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('messagesAdmin.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tout</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact.liste') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact</p>
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
                <a href="{{ route('student.liste_dossier') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>étudiants</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.mark.list_student') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>bulletins</p>
                </a>
            </li>

        </ul>
    </li>
    <li class="nav-header">Settings</li>
    <li class="nav-item">
        <a href="{{ route('admin.historique.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Historique</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
                Autorisations
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.role.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>rôles

                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.permission.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>permission</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.role.attribution') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>attribution</p>
                </a>
            </li>

        </ul>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.settings.index') }}" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
                Paramètres
            </p>
        </a>
    </li>
</ul>
