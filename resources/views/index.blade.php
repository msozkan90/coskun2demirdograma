<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Coskun 2 Demir Doğrama</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-onix-digital.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    @yield('style')
    <style>
        .example-1{
            background-color: red!important;
            position: fixed!important;
            height: 0!important;
            overflow: hidden!important;
            transition: height 0.66s ease-out!important;


        }
        /*!*.deneme.loaded {*!*/
        /*!*    height: 100px!important;*!*/
        /*!*}*!*/
        .closebtn {
            margin-left: 15px;
            color: black;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
        }

        .closebtn:hover {
            color: gray;
        }
        .big {
            font-size: 0.7em;
            float: right;
            margin-top: 37px!important;
            margin-left: 20px!important;
            margin-right: 20px!important;
        }

        /* Custom dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 3px; /* demo only */
        }

        .custom-dropdown select {
            background-color: #FF695F;
            color: #fff;
            font-size: inherit;
            padding: .3em;
            padding-right: 0.5em;
            border: 0;
            margin: 0;
            border-radius: 3px;
            text-indent: 0.01px;
            text-overflow: '';
            -webkit-appearance: button; /* hide default arrow in chrome OSX */
        }

        .custom-dropdown::before,
        .custom-dropdown::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .custom-dropdown select[disabled] {
            color: rgba(0,0,0,.3);
        }

        .custom-dropdown select[disabled]::after {
            color: rgba(0,0,0,.1);
        }

        .custom-dropdown::before {
            background-color: rgba(0,0,0,.15);
        }

        .custom-dropdown::after {
            color: rgba(0,0,0,.4);
        }
        .pop_image{
            margin-left: auto;
            margin-right: auto;
            width: 600px!important;
            height: 400px!important;
        }
        .modal-all-images,.modal-images{
            margin-left: auto;
            margin-right: auto;
            width: 450px!important;
            height: 280px!important;
            overflow: hidden;

        }
        @media only screen and (max-width:991px) {
            .pop_image{
                width: 400px!important;
                height: 220px!important;
            }
        }


        .modal-images img {
            width: 100%;
            transition: 0.5s all ease-in-out;
        }

        .modal-images:hover img {
            transform: scale(1.15);
        }



    </style>

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
@include('shared.header')
<!-- ***** Header Area End ***** -->

@include('shared.main-services')

<div id="about" class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="{{asset('assets/images/about-left-image.png')}}" alt="Two Girls working together">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Grow your website with our <em>SEO Tools</em> &amp; <span>Project</span> Management</h2>
                    <p>You can browse free HTML templates on Too CSS website. Visit the website and explore latest website templates for your projects.</p>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="fact-item">
                                <div class="count-area-content">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/service-icon-01.png')}}" alt="">
                                    </div>
                                    <div class="count-digit">320</div>
                                    <div class="count-title">SEO Projects</div>
                                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="fact-item">
                                <div class="count-area-content">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/service-icon-02.png')}}" alt="">
                                    </div>
                                    <div class="count-digit">640</div>
                                    <div class="count-title">Websites</div>
                                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="fact-item">
                                <div class="count-area-content">
                                    <div class="icon">
                                        <img src="{{asset('assets/images/service-icon-03.png')}}" alt="">
                                    </div>
                                    <div class="count-digit">120</div>
                                    <div class="count-title">Satisfied Clients</div>
                                    <p>Lorem ipsum dolor sitti amet, consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
        <img src="{{asset('assets/images/portfolio-left-dec.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Our Recent <em>Projects</em> &amp; Case Studies <span>for Clients</span></h2>
                    <span>Our Portfolio</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="owl-carousel owl-portfolio" >
                    @foreach($projects as $project)
                        <div class="item" >
                            <div class="thumb" >
                                <img src=" {{$project['image']}}" style="object-fit: cover!important;width: 363px;height: 525px;" alt="Coskun-2-demir-dograma">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a rel="sponsored" href="https://templatemo.com/tm-564-plot-listing" target="_parent"><h4>First Project</h4></a>
                                        @if(\App\Models\Images::where('project_id','=',$project['id'])->get()->get('0'))
                                        <button type="button" class="btn btn-primary showButton" data-all-images="{{\App\Models\Project::find($project['id'])->images_data}}"  data-id="{{ $project['id'] }}" data-image="{{ $project['image'] }}" data-description="{{ $project['description'] }}" data-start="{{ $project['started-date'] }}" data-finish="{{ $project['finished-date'] }}"  data-title="{{ $project['title'] }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Show Detail
                                        </button>
                                        @else
                                            <button type="button" class="btn btn-primary showButton"   data-id="{{ $project['id'] }}" data-image="{{ $project['image'] }}" data-description="{{ $project['description'] }}" data-start="{{ $project['started-date'] }}" data-finish="{{ $project['finished-date'] }}"  data-title="{{ $project['title'] }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Show Detail
                                            </button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body modal-dialog-scrollable">
                        <div class="pop_image mb-3">
                            <img class="modal-image pop_image" src="" id="staticBackdropLabel">
                        </div>
                        <p class="modal-description mt-5" id="staticBackdropLabel">
                        </p>

                        <div class="container px-4 mt-5 ">
                            <h5 class="modal-title" id="staticBackdropLabel">FOTO GALERİ</h5>
                            <hr>
                            <div class="row gx-5 mt-3 foto-all" id="foto-all">

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="footer-item">
                        <div class="p-2">
                            <h6 class=" modal-start" id="staticBackdropLabel">Projenin Başlangıç Tarihi:</h6>
                            <h6 class="modal-finish" id="staticBackdropLabel">Projenin Bitiş Tarihi:</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@include('shared.pricing-sub')

@include('shared.video-contact')

@include('shared.footer')



<!-- Scripts -->


<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/animation.js')}}"></script>
<script src="{{asset('assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

@yield('script')
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
<script>

    function changeLanguage(lang){
        window.location='{{url("change-language")}}/'+lang;
    }
</script>

<script>

    let myModal = document.getElementById('myModal')
    let myInput = document.getElementById('myInput')
    let showButton = document.getElementById('showButton')
    let modalBody = document.getElementsByClassName('modal-body')
    let modalTitle = document.getElementsByClassName('modal-title')
    let modalDescription = document.getElementsByClassName('modal-description')
    let modalStart = document.getElementsByClassName('modal-start')
    let modalFinish = document.getElementsByClassName('modal-finish')
    let modalImage = document.getElementsByClassName('modal-image')
    let modalAllImages = document.getElementsByClassName('modal-all-images')
    let fotoAll = document.getElementsByClassName('foto-all')
    let foto_All = document.getElementById('foto-all')
    let remove_child=foto_All.firstElementChild;


    $('.showButton').click(function (){
        for (var i = 0; i < 15; i++) {
            $("#remove-element").remove();
        }
        // console.log($(this).attr('data-id'));
        // modalBody[0].innerHTML=$(this).attr('data-description');
        modalTitle[0].innerHTML=$(this).attr('data-title');
        modalDescription[0].innerHTML=$(this).attr('data-description');
        modalStart[0].innerHTML='Projenin başlangıç tarihi : ' + $(this).attr('data-start');
        modalFinish[0].innerHTML='Projenin başlangıç tarihi : ' + $(this).attr('data-finish');
        modalImage[0].src= $(this).attr('data-image') ;
        let all_images=JSON.parse($(this).attr('data-all-images'))
        $(all_images).each(function(index, value) {
            // console.log(all_images[`${index}`]['image']);
            const div_element = document.createElement("div");
            const a_element = document.createElement("a");
            const img_element = document.createElement("img");
            img_element.src=all_images[`${index}`]['image'];
            img_element.className='p-3 border bg-light modal-all-images';
            a_element.href=all_images[`${index}`]['image'];
            a_element.className='modal-images';
            div_element.className='col mb-3';
            div_element.id='remove-element';
            a_element.appendChild(img_element);
            div_element.appendChild(a_element);
            fotoAll[0].appendChild(div_element);

        });

    });
    let project_card = document.getElementById('deneme2')
    $('.modal').on('shown.bs.modal', function (e) {
        myInput.focus()
    });
    $('.modal').on('hidden.bs.modal', function (e) {
        console.log('oldu');
        project_card.style.backgroundColor = 'red';
        console.log(project_card);
    });




</script>
<script>

</script>


</body>
</html>
