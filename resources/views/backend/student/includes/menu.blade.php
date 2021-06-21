<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


    <li class="nav-item menu-open">
        <a href="" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Gestion des Notes
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('student.note') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Examens & Devoirs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('student.maquette') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Maquêtte</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('student.class_routine_student') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Emploi du temps</p>
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
                <a href="{{ route('messagesStudent.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Msg

                    </p>
                </a>
            </li>


        </ul>
    </li>
</ul>
