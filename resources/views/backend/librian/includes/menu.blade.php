<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


    <li class="nav-item menu-open">
        <a href="" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Gestion des Livres
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('librian.book.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ajoutre</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('librian.book.index') }}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('librian.categories') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>catégories</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Gestion des Emprunts
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('librian.book_issu.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('librian.book_issu.new') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>nouveau</p>
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
                <a href="{{ route('messagesLibrian.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Msg

                    </p>
                </a>
            </li>


        </ul>
    </li>
</ul>
