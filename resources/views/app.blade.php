<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Golsha Teb">
    <meta name="generator" content="Golsha Teb">
    <title>گلشا تب - @yield('page-title')</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/golshateb.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body>

<div class="container-fluid shadow-bottom p-3">
    <div>
        @livewire('header')
    </div>
</div>

<div class="container-fluid footer-bg-gray">
    <div>
        @livewire('navbar')
    </div>
</div>

<div class="container">
    <div style="min-height: 500px">
        @yield('content')
    </div>
    @livewire('footer')
</div>
<div class="container-fluid">
    @livewire('footer-green-banner')
    @livewire('footer-copyright')
</div>



@livewireScripts
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message, event.detail.title ?? '') ;
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    })
</script>

</body>
</html>
