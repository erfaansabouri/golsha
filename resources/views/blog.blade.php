<!DOCTYPE html>
<html lang="fa">
@livewireStyles
@include('blog-pages.partials.head', ['pageTitle' => 'گلشا تب' . ' - ' . @$pageInfo['title'] ?? 'گلشا تب'])
@yield('head')

<body class="blogBody">
 @include('blog-pages.partials.navbar')


@yield('content')
@include('blog-pages.partials.footer')
@include('blog-pages.partials.scripts')
@yield('scripts')
@livewireScripts
</body>
</html>