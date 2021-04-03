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
    <nav class="navbar navbar-expand-md navbar-dark fixed-top pt-3  bg-red">
        <a class="navbar-brand" href="#">سندباد</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">كيف نعمل  <span class="sr-only">(current)</span></a>
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
            <div class="carousel-caption  d-md-block">
                <h5 class="title1">تسوق من اي موقع امريكي </h5>
                <p class="subtitile1 d-none">شحن لجميع محافظات العراق </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/shopping2.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
                <h5 class="title2">اشتري القطع الاصلية من المناشئ العالمية </h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/shopping3.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
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
{{--Why Us --}}
    <div class="whyus pb-5">
        <div class="container">
            <h1 class="text-center p-5 "> لماذا تتسوق و تشحن معنا؟ </h1>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 fas">  <h2 class="  mb-4"> شحن جوي سريع  </h2>
                    <i class="fas fa-shipping-fast fa-8x"></i>
                 </div>
                <div class="col-6 col-md-4 col-lg-3 fas">
                    <h2 class=" mb-4">طرق دفع متعددة </h2>
                    <i class="fas fa-money-bill-wave-alt fa-8x"></i></div>
                <div class="col-6 col-md-4 col-lg-3 fas">
                    <h2 class=" mb-4">خدمة دعم ٢٤ ساعة</h2>
                    <i class="fas fa-users-cog fa-8x"></i></div>
                <div class="col-6 col-md-4 col-lg-3 fas">
                    <h2 class=" mb-4">خدمة خزن ٤٥ يوم</h2>
                    <i class="fas fa-store-alt fa-8x"></i></div>

                <div class="col-6 col-md-4 col-lg-3 mt-5 fas">
                    <h2 class=" mb-4">لايوجد ضريبة شراء</h2>
                    <i class="fas fa-file-invoice-dollar fa-8x"></i></div>
                <div class="col-6 col-md-4 col-lg-3 mt-5 fas">
                    <h2 class=" mb-4">تسوق بدون اشتراك</h2>
                    <i class="fab fa-slack-hash fa-8x"></i></div>
                <div class="col-6 col-md-4 col-lg-3 mt-5 fas">
                    <h2 class=" mb-4">خدمة ارجاع البضائع</h2>
                    <i class="fas fa-undo-alt fa-8x"></i></div>
                <div class="col-6 col-md-4 col-lg-3 mt-5 fas">
                    <h2 class=" mb-4">خدمة فحص البضائع</h2>
                    <i class="fas fa-calendar-check fa-8x"></i></div>
            </div>
        </div>
    </div>
{{--How it works --}}
<div class="shipway pb-5">

        <h1 class="text-center p-5 ">كيف نعمل </h1>
        <div class="row ">
           <div class="container">
                    <div style=" position: relative; ">
                        <div class="d-flex lineParent">
                            <div class="connecting-line"></div>
                        </div>
                        <div class="d-flex">
                            <div class="stepTab">
                                <div class="square-tab">
                                    <div>١</div>
                                </div>
                            </div>
                            <div class="stepTab">
                                <div class="square-tab">
                                    <div>٢</div>
                                </div>
                            </div>
                            <div class="stepTab">
                                <div class="square-tab">
                                    <div>٣</div>
                                </div>
                            </div>
                            <div class="stepTab">
                                <div class="square-tab">
                                    <div>٤</div>
                                </div>
                            </div>
                            <div class="stepTab">
                                <div class="square-tab">
                                    <div>٥</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="stepTab text-break">
                           تسوق من اي موقع امريكي او عالمي
                            <img src="{{ asset('img/step1.svg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="stepTab text-break">
                             اشحن الى مخازننا في امريكا
                            <img src="{{ asset('img/step2.svg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="stepTab text-break">
                            جمع مشترياتك في مخازننا
                            <img src="{{ asset('img/step3.svg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="stepTab text-break">
                            اشحن الى العراق باسعار تنافسية
                            <img src="{{ asset('img/step4.svg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="stepTab text-break">
                            استلم بضاعتك من وكيل الشحن في محافظتك
                            <img src="{{ asset('img/ship5.svg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>


</div>
{{--Our Partners --}}
<div class="partners pb-5">
    <div class="container">
        <h1 class="text-center p-5 ">شركائنا </h1>
        <div class="row ">
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.amazon.com" target="_blank"> <img src="{{ asset('img/logos/amazon.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.ebay.com" target="_blank"> <img src="{{ asset('img/logos/ebay.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.macy.com" target="_blank"> <img src="{{ asset('img/logos/macy.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.nordstrom.com" target="_blank"> <img src="{{ asset('img/logos/nordstrom.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.maccosmetics.com" target="_blank"> <img src="{{ asset('img/logos/mac.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.maccosmetics.com" target="_blank"> <img src="{{ asset('img/logos/sephora.png') }}" class="w-100"> </a> </div>


        </div>
        <div class="row mt-5">
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.merrell.com" target="_blank"> <img src="{{ asset('img/logos/merrell.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.oakley.com" target="_blank"> <img src="{{ asset('img/logos/oakley.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.511tactical.com/" target="_blank"> <img src="{{ asset('img/logos/5.11.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.thenorthface.com/" target="_blank"> <img src="{{ asset('img/logos/north.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.underarmour.com/" target="_blank"> <img src="{{ asset('img/logos/under.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.nike.com/" target="_blank"> <img src="{{ asset('img/logos/nike.png') }}" class="w-100"> </a> </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.oreillyauto.com" target="_blank"> <img src="{{ asset('img/logos/railey.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.autozone.com" target="_blank"> <img src="{{ asset('img/logos/zone.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.car-part.com" target="_blank"> <img src="{{ asset('img/logos/logocar.jpeg') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.ngksparkplugs.com" target="_blank"> <img src="{{ asset('img/logos/ngk.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.bosch.com" target="_blank"> <img src="{{ asset('img/logos/bosch.png') }}" class="w-100"> </a> </div>
            <div class="col-6 col-md-4 col-lg-2 p-3 "> <a href="https://www.milwaukeetool.com" target="_blank"> <img src="{{ asset('img/logos/miluakee.png') }}" class="w-100"> </a> </div>

        </div>
    </div>
</div>
{{--Delivery companies--}}
<div class="delivery pb-5">
    <div class="container">
        <h1 class="text-center p-5 "> شركات الشحن </h1>
        <div class="row">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-2 p-3 ">  <img src="{{ asset('img/logos/dhl.png') }}" class="w-100">  </div>
                <div class="col-6 col-md-4 col-lg-2 p-3 ">  <img src="{{ asset('img/logos/fedex.png') }}" class="w-100">  </div>
                <div class="col-6 col-md-4 col-lg-2 p-3 ">  <img src="{{ asset('img/logos/usps.png') }}" class="w-100">  </div>
                <div class="col-6 col-md-4 col-lg-2 p-3 ">  <img src="{{ asset('img/logos/ups.png') }}" class="w-100">  </div>
                <div class="col-6 col-md-4 col-lg-2 p-3 ">  <img src="{{ asset('img/logos/aramex.png') }}" class="w-100">  </div>
            </div>

        </div>
    </div>
</div>
{{--    Calculator--}}
    <div class="calculator pb-5">
        <div class="container">
            <h1 class="text-center p-5 ">حاسبة الشحن </h1>
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <form method="POST" action="{{url('calculateshippings')}}" accept-charset="UTF-8">
                        @csrf
                        <div class="col pt-3">
                            <input type="text"name="country" class=" text-right form-control" placeholder="الدولة">
                        </div>
                        <div class="col pt-3">
                            <input type="text" class=" text-right form-control" placeholder="المدينة">
                        </div>
                        <div class="col pt-3 ">
                            <input type="text" class=" text-right form-control" placeholder="الطول">
                        </div>
                        <div class="col pt-3">
                            <input type="text" class="text-right form-control" placeholder="العرض">
                        </div><div class="col pt-3">
                            <input type="text" class="text-right form-control" placeholder="الارتفاع">
                        </div>

                        <button type="submit" class="btn float-right btn-warning mt-4">احسب</button>
                    </form>

                </div>



            </div>
        </div>
    </div>
{{--Contact US--}}
<div class="contact pb-5">
    <div class="container">
        <h1 class="text-center p-5 "> اتصل بنا  </h1>
        <div class="row">
          <div class="col-lg-6">
              <form  >

                  <div class="form-group">
                      <label for="exampleFormControlInput1">الاسم</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="اسم">
                  </div><div class="form-group">
                      <label for="exampleFormControlInput1">الايميل</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="الايميل">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlTextarea1">الرساله</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="col-auto my-1">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
          </div>

            <div class="col-lg-6">
                <h1 class="text-right"> موقع الشركة</h1>
                <h3 class="text-right"> 1001 SW 5th Ave #1100</h3>
                <h3 class="text-right"> Portland, OR 97204</h3>
                <h1 class="text-right pt-3"> هاتف</h1>
                <h3 class="text-right"> (503) 544-3120</h3>
                <h1 class="text-right pt-3"> ايميل</h1>
                <h3 class="text-right"> (503) 544-3120</h3>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
