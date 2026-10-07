<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed
{{ request()->segment(1) === 'vendors' ? 'vendor-normal-page' : 'thyohar-enhanced-page' }}">

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img
            class="animation__wobble"
            src="{{ asset('dist/img/AdminLTELogo.png') }}"
            alt="AdminLTELogo"
            height="60"
            width="60"
        >
    </div>

    <!-- Header / Sidebar -->
    @include('layouts.partials.header')

    <!-- Main Content -->
    @yield('content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>

    <!-- Footer -->
    @include('layouts.partials.footer')

</div>

<!-- Scripts -->
@include('layouts.partials.footer-scripts')

</body>
</html>