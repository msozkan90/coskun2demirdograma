<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-onix-digital.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">



    <style>

        .muh-mt-10 {
            margin-top: 5rem;

        }
        .form-group{
            margin-bottom: 10px;

        }
        .auth-form-dark{
            margin-top: 5rem;
            border-radius: 50px;
            border: 3px solid #FF6A5F;
            background-color: rgba(245, 245, 245, 0.8);

            margin-bottom: 270px;
        }
        body{
            background-color: #e3e3e3;
        }


    </style>
    @yield('style')
</head>
<body>
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="{{asset('coskun.png')}}">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="/#top" class="active">{{__("Anasayfa")}}</a></li>
                        <li class="scroll-to-section"><a href="/#services">{{__("Hizmetler")}}</a></li>
                        <li class="scroll-to-section"><a href="/#about">{{__("Hakkımızda")}}</a></li>
                        <li class="scroll-to-section"><a href="/#portfolio">{{__("Projeler")}}</a></li>
                        <li class="scroll-to-section"><a href="/#video">{{__("Videolar")}}</a></li>
                        <li class="scroll-to-section"><a href="/#contact">{{__("İletişim")}}</a></li>
                        @guest()
                            <li class="scroll-to-section"><a href="{{route('register')}}">{{__("Kayıt ol")}}</a></li>
                            <li class="scroll-to-section"><a href="{{route('login')}}">{{__("Giriş yap")}}</a></li>
                        @else
                            <li class="scroll-to-section"><a href="{{route('logout')}}">{{__("Çıkış Yap")}}</a></li>
                        @endauth
                        <li class="scroll-to-section"><div class="main-red-button-hover"><a href="/#contact">{{__("Hemen İletişime Geç")}}</a></div></li>


                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>



    @yield('content')





<!-- Scripts -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/animation.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

<script>
    // Acc
    $(document).on("click", ".naccs .menu div", function() {
        var numberIndex = $(this).index();

        if (!$(this).is("active")) {
            $(".naccs .menu div").removeClass("active");
            $(".naccs ul li").removeClass("active");

            $(this).addClass("active");
            $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

            var listItemHeight = $(".naccs ul")
                .find("li:eq(" + numberIndex + ")")
                .innerHeight();
            $(".naccs ul").height(listItemHeight + "px");
        }
    });
</script>
@yield('js')
</body>
</html>
