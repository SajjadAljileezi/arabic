<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title> سندباد | تسوق من امريكا واشحن الى العراق </title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-red">
        <a class="navbar-brand" href="#">سندباد</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">الاشتراكات <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">حاسبة الشحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">عملنا</a>
                </li>
            </ul>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-outline-success my-2 my-sm-0">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-success mr-2 my-2 my-sm-0">تسجيل الدخول</a>
{{--                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-primary my-2 my-sm-0">سجل</a>
                    @endif
                @endauth

                @endif
        </div>
    </nav>
</header>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/shopping1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="title1">تسوق من اي موقع امريكي </h5>
                <p class="subtitile1">شحن لجميع محافظات العراق </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/shopping2.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="title2">اشتري القطع الاصلية من المناشئ العالمية </h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/shopping3.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="title3"> طرق دفع متعددة وبدون ضرائب مع ٤٥ يوم فترة تجميع الاغراض  </h5>

            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    <div class="whyus">
        <div class="container">
            <h1 class="text-center p-5 "> لماذا تتسوق و تشحن معنا؟ </h1>
            <div class="row">
                <div class="col-lg-3 fas">  <h2 class="  mb-4"> شحن جوي سريع  </h2>
                    <i class="fas fa-shipping-fast fa-10x"></i>
                 </div>
                <div class="col-lg-3 fas">
                    <h2 class=" mb-4">طرق دفع متعددة </h2>
                    <i class="fas fa-money-bill-wave-alt fa-10x"></i></div>
                <div class="col-lg-3 fas">
                    <h2 class=" mb-4">خدمة دعم ٢٤ ساعة</h2>
                    <i class="fas fa-users-cog fa-10x"></i></div>
                <div class="col-lg-3 fas">
                    <h2 class=" mb-4">خدمة خزن ٤٥ يوم</h2>
                    <i class="fas fa-store-alt fa-10x"></i></div>
            </div>
        </div>
    </div>
    </body>
</html>
