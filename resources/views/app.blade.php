<!DOCTYPE html>
<html lang="fa">
@livewireStyles
@include('front-pages.partials.head', ['pageTitle' => 'گلشا تب' . ' - ' . @$pageInfo['title'] ?? 'گلشا تب'])
@yield('head')

<body>

<header>
    @include('front-pages.partials.topbar')
    @include('front-pages.partials.navbar')
</header>

@yield('content')
@include('front-pages.partials.footer')

<div class="hdrSubMnuBox"></div>
<div class="hdrSrchSubBx"></div>
@include('front-pages.partials.scripts')
@yield('scripts')
@livewireScripts
</body>
</html>