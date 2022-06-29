<!DOCTYPE html>
<html lang="fa">
@livewireStyles
@include('front-pages.partials.head', ['pageTitle' => 'گلشا تب'  .' '. @$pageInfo['title'] ])
@yield('head')
<style>
    #more {display: none;}
</style>
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
@stack('scripts')
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

    function toggleShowMore() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>
</body>
</html>
