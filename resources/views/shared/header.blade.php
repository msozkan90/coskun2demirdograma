<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">


    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="" class="logo main-logo">
                        <img src="{{asset('coskun.png')}}" >
                    </a >


                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">{{__("Anasayfa")}}</a></li>
                        <li class="scroll-to-section"><a href="#services">{{__("Hizmetler")}}</a></li>
                        <li class="scroll-to-section"><a href="#about">{{__("Hakkımızda")}}</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">{{__("Projeler")}}</a></li>
                        <li class="scroll-to-section"><a href="#video">{{__("Videolar")}}</a></li>
                        <li class="scroll-to-section"><a href="#contact">{{__("İletişim")}}</a></li>
                        @guest()
                            <li class="scroll-to-section"><a href="{{route('register')}}">{{__("Kayıt ol")}}</a></li>
                            <li class="scroll-to-section"><a href="{{route('login')}}">{{__("Giriş yap")}}</a></li>
                        @else
                            <li class="scroll-to-section"><a href="{{route('logout')}}">{{__("Çıkış Yap")}}</a></li>
                        @endauth
{{--                        @auth()--}}
                            @if(auth()->user() and  auth()->user()->status == 1 )
                                <li class="scroll-to-section">   <div class="main-blue-button-hover"><a href="{{route('index')}}">{{__("Admin Paneli")}}</a></div></li>
                            @else
                                <li class="scroll-to-section"><div class="main-red-button-hover"><a href="#contact">{{__("Hemen İletişime Geç")}}</a></div></li>
                            @endif
{{--                        @elseauth()--}}
{{--                            <li class="scroll-to-section"><div class="main-red-button-hover"><a href="#contact">{{__("Hemen İletişime Geç")}}</a></div></li>--}}
{{--                        @endauth--}}



                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>




    @if(session("status-danger"))

        <div class="alert alert-danger container mt-3" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{session("status-danger")}}
        </div>
    @elseif(session("status-success"))

        <div class="alert alert-success container mt-3" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{session("status-success")}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger container mt-3">
            <ul>
                <span class="closebtn" onclick="this.parentElement.parentElement.style.display='none';">&times;</span>
                @foreach ($errors->all() as $error)

                  <li> {{ $error }}</li>


                @endforeach
            </ul>
        </div>
    @endif
</header>
