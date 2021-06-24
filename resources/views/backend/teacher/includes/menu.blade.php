<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


    <li class="nav-item menu-open">
        <a href="" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Gestion des Cours
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('teachers.c_r') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>schédule</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('teacher.classes.liste_classe') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('teacher.classes.coeff_bareme') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Coef Barèmes</p>
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
                <a href="{{ route('messagesTeacher.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Msg

                    </p>
                </a>
            </li>


        </ul>
    </li>
</ul>
