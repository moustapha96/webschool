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
                            class="icon-layers"></i><span data-i18n="" class="menu-title"> {{ Auth::user()->prenom }}
                            -- {{ Auth::user()->role }} </span></a>


                    {{-- gestion des dépenses --}}
                <li class="has-sub nav-item"><a><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">Dépenses</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'payement_salaire') }}"><a href=""
                                class="menu-item">Payement Salaire</a>
                        </li>
                        <li class="{{ is_active($activeMain, 'autre') }}"><a href="" class="menu-item">Autre</a>
                        </li>
                    </ul>
                </li>
                {{-- gestion des récette --}}
                <li class="has-sub nav-item"><a><i class="icon-screen-desktop"></i><span data-i18n=""
                            class="menu-title">Récettes</span></a>
                    <ul class="menu-content">
                        <li class="{{ is_active($activeMain, 'inscription') }}"><a href=""
                                class="menu-item">Inscriptions </a>
                        </li>
                        <li class="{{ is_active($activeMain, 'mensualite') }}"><a href=""
                                class="menu-item">Mensualités</a>
                        </li>
                    </ul>
                </li>

                {{-- gestion des notifications --}}
                

                <li class="has-sub nav-item"><a ><i class="icon-pie-chart"></i><span data-i18n=""
                            class="menu-title">Messagerie</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('messagesAccountant.index') }}" class="menu-item">Messages
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
