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
<script>
    function copyToClipboard() {
        /* Get the text field */
        var copyText = document.getElementById("copyMe");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
    }
</script>
</body>
</html>
