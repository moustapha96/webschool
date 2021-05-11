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

               
                
               
                <li class="has-sub nav-item"><a href="#"><i class="icon-pie-chart"></i><span data-i18n=""
                            class="menu-title">Messagerie</span><span
                            class="tag badge badge-pill badge-success white mt-1">2</span></a>
                    <ul class="menu-content">
                        <li><a href="chartist.html" class="menu-item">Notifications</a>
                        </li>
                        <li><a href="chartjs.html" class="menu-item">Messages</a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a
                        href="http://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/documentation"><i
                            class="icon-book-open"></i><span data-i18n="" class="menu-title">Statistiques</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="icon-support"></i><span
                            data-i18n="" class="menu-title">Historiques</span></a>
                </li>
                <li class=" nav-item"><a><i class="icon-support"></i><span data-i18n="" class="menu-title">Mon
                            compte</span></a>
                </li>
               
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
