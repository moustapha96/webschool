<aside class="main-sidebar sidebar-dark-primary elevation-4">

    @php isset($favicon) ? $favicon = $favicon." | " . get_setting('favicon') : $favicon = get_setting('favicon')  ; @endphp
    @php isset($app_name) ? $app_name = $app_name." | " . get_setting('app_name') : $app_name = get_setting('app_name')  ; @endphp
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset($favicon) }}" alt="{{ $favicon }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $app_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->prenom . ' ' . Auth::user()->nom }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @include('backend.'.Auth::user()->role.'.includes.menu')

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
