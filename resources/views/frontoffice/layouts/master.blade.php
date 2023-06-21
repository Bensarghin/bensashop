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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

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
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h4 class="offcanvas-title" id="offcanvasLabel">سلة مشترياتي</h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div id="CartData">
                    
                </div>
            </div>
            <div class="offcanvas-footer p-1 m-2 bg-striped">
                <a href="#" class="btn btn-dark w-100 mb-2">تأكيد الطلب</a>
                <a href="#" class="btn btn-warning w-100">عرض سلة المشتريات</a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg p-4 bg-body-tertiary shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('frontoffice/img/logo.svg')}}" width="212" alt=""></a>
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
                    <a class="nav-link position-relative shopping-cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                      
                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                    </a>
                    <a class="nav-link"><i class="fa-solid fa-magnifying-glass fa-lg"></i></a>
                </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <footer class="mt-5 px-5 pt-5" style="background-color: #FFF">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <a class="footer-brand" href="{{route('home')}}"><img src="{{asset('frontoffice/img/logo.svg')}}" width="312px" alt=""></a>
                    </div>
                    <p>
                    هذا المتجر بوابتك الجديدة للتسوق إلكترونيا بشكل سهل وبسيط. نوفر لك منتجات متععدة ذات جودة عالية لتختار منها الأفضل وبسعر تنافسي لن تجده في أي مكان أخر. التسوق معنا عملية ممتعة وأمنة. ونوفر لك كل ما تحتاجه من التسهيلات سواء في اختيار المنتج أو في عملية الدفع أو في عملية الشحن.
                   </p>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li><h3>الشروط والسياسات</h3></li>
                        <li><a href="#" class="text-decoration-none text-dark">سياسة الخصوصية</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">سياسة الإسترجاع</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">سياسة الشحن</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-unstyled">
                        <li><h3>روابط سريعة</h3></li>
                        <li><a href="#" class="text-decoration-none text-dark">تصنيفاتنا</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">اتصل بنا</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">سياسة الإسترجاع</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div>
                <p class="text-center">Copright &copy; bensashop 2023</p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{asset('frontoffice/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('frontoffice/js/main.js')}}"></script>
</body>
</html>