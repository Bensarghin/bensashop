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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="top-navbar">
            <p class="sale-notification">
                عرض حصري - التوصيل بالمجان و الدفع عند الاستلام
            </p>
        </nav>
        <nav class="navbar navbar-expand-lg p-4 bg-body-tertiary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('frontoffice/img/logo.svg')}}" width="212px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav m-auto">
                    <a class="nav-link  active" aria-current="page" href="{{route('home')}}"><b>الصفحة الرئيسية</b></a>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{asset('frontoffice/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
          // Attach a click event listener to each of the other images
          $('.variants-img').on('click', function() {
            $('.variants-img').css({
                'border' : '1px solid #f9f3f0',
                'border-radius' : '3px'
              });
              // Get the source of the clicked image
              var clickedSrc = $(this).attr('src');
              $(this).css({
                'border' : '2px solid #00425a'
              });
              
              // Set the main image source to the clicked image source
              $('#main-img').attr('src', clickedSrc);
          });

        // Initialize Slick carousel
        $('#small-images-container').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            vertical: true,
            verticalSwiping: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                    slidesToShow: 6
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                    slidesToShow: 3
                    }
                    }
                ]
            });

          });
      </script>
</body>
</html>