<!DOCTYPE html>
<html lang="en" class="loading">

<head>

    @php isset($title) ? $title = $title." | " . get_setting('site_title') : $title = get_setting('site_title') . ' | ' . get_setting('site_slogan') ; @endphp
    <title>{{ $title }}</title>
    @includeIf('backend.layouts.styles')
    @yield('styles')
</head>

<body data-col="2-columns" class=" 2-columns ">
    <div class="wrapper">

        <?php
        if (!isset($activeMain)) {
        $activeMain = '';
        }
        if (!isset($activeSubMain)) {
        $activeSubMain = '';
        }
        ?>


        @include('backend.'. Auth::user()->role . '.includes.header')
        @include('backend.'. Auth::user()->role . '.includes.nav')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        @if (session()->has('messageSuccess'))
                            <div class="alert alert-success">
                                {{ session()->get('messageSuccess') }}
                            </div>
                        @endif
                        @yield('main')
                        @include('backend.'. Auth::user()->role . '.includes.footer')
                    </div>
                </div>
            </div>
        </div>




    @includeIf('backend.' . Auth::user()->role . '.includes.aside')

    @includeIf('backend.layouts.scripts')
    @yield('scripts')


</body>

</html>
