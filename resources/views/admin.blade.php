<!DOCTYPE html>
<html>
@livewireStyles

@include('admin-pages.partials.head', ['pageTitle' => $pageTitle ?? ''])
@yield('head')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin-pages.partials.navbar')
    @include('admin-pages.partials.sidebar')
    @yield('content')
    @include('admin-pages.partials.footer')

</div>
<!-- ./wrapper -->
@include('admin-pages.partials.scripts')
@yield('scripts')
@livewireScripts
</body>
</html>
