<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Golsha Teb">
    <meta name="generator" content="Golsha Teb">
    <title>GolshaTeb</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/golshateb.css') }}">
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
    @livewire('footer')
</div>
<div class="container-fluid">
    @livewire('footer-green-banner')
    @livewire('footer-copyright')
</div>



@livewireScripts
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>
</html>
