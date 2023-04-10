<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontoffice/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontoffice/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontoffice/css/main.css')}}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg p-4 bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{asset('frontoffice/img/logo.svg')}}" width="241px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav m-auto">
                    <a class="nav-link  active" aria-current="page" href="#"><b>الصفحة الرئيسية</b></a>
                    <a class="nav-link " href="#"><b>المجموعات</b></a>
                    <a class="nav-link " href="#"><b>آخر المنتجات</b></a>
                </div>
                <div class="navbar-nav me-auto">
                    <a class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a class="nav-link"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <script src="{{asset('frontoffice/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>