<!DOCTYPE html>
<html lang="en" class="loading">

<head>

    @php isset($title) ? $title = $title." | " . get_setting('site_title') : $title = get_setting('site_title') . ' | ' . get_setting('site_slogan') ; @endphp
    <title>{{ $title }}</title>
    @includeIf('backend.layouts.styles')
    @yield('styles')
</head>

<body
{{-- class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" --}}
    class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @php isset($logo) ? $logo = $logo." | " . get_setting('logo') : $logo = get_setting('logo')  ; @endphp
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset($logo) }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <?php
        if (!isset($activeMain)) {
        $activeMain = '';
        }
        if (!isset($activeSubMain)) {
        $activeSubMain = '';
        }
        ?>
        @include('backend.layouts.header')
        @include('backend.layouts.menu')
        {{-- @include('backend.layouts.menu') --}}
        <div class="content">
            @yield('main')
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            @include('backend.layouts.footer')
            {{-- @include('backend.'. Auth::user()->role . '.includes.footer') --}}
        </div>


        @includeIf('backend.layouts.scripts')
        @yield('scripts')


</body>

</html>
