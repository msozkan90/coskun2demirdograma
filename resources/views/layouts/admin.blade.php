<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/ckeditor/samples/css/samples.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}">
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>--}}

{{--    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">--}}

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    @yield('style')
    <style>
        body ,input ,select ,option, textarea {
            color: white!important;
        }
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

        .ck-editor__editable {
            min-height: 200px !important;
            color: black;
        }
        .page-item,.page-link,page-title{
            background-color: #191C24;
            color: #6C7293;
        }
        span.page-link{
            background-color: black!important;
            color: white!important;
            border: white 1px solid!important;
            /*color: #6C7293;*/
        }
        .badge{
            margin-left: 10px;
        }

        .pop_image{
            margin-left: auto;
            margin-right: auto;
            width: 600px!important;
            height: 400px!important;
        }

        @media only screen and (max-width:991px) {
            .pop_image{
                width: 400px!important;
                height: 220px!important;
            }
        }



    </style>
</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo" href=""><img src="{{asset('coskun.png')}}" style="width:50px;height: 45px" alt="logo" /></a>
            <a class="sidebar-brand brand-logo-mini" href=""><img src="{{asset('coskun.png')}}" style="width: 100px;height: 50px" alt="logo" /></a>
        </div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{asset('coskun.png')}}"   alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">{{auth()->user()->name}}</h5>

                        </div>
                    </div>

                </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link {{ Route::is('index') ? 'active' : '' }}" href="{{route('index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                    <span class="menu-title">Kontrol Paneli</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link {{ Route::is('project') ? 'active' : '' }}" href="{{route('project')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                    <span class="menu-title">Projeler</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link {{ Route::is('video') ? 'active' : '' }}" href="{{route('user')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                    <span class="menu-title">Kullanıcılar</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link {{ Route::is('video') ? 'active' : '' }}" href="{{route('video')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                    <span class="menu-title">Videolar</span>
                </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link {{ Route::is('image') ? 'active' : '' }}" href="{{route('image')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                    <span class="menu-title">Resimler</span>
                </a>
            </li>

        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href=""><img src="{{asset('coskun.png')}}" style="width: 100px;height: 50px"  alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="/">
                            <i class="mdi mdi-home"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                            <div class="navbar-profile">
                                <img class="img-xs rounded-circle" src="{{asset('coskun.png')}}" alt="">
                                <p class="mb-0 d-none d-sm-block navbar-profile-name">{{auth()->user()->name}}</p>
                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                            <h6 class="p-3 mb-0">Profile</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Settings</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item" href="{{'logout'}}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-logout text-danger"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1">Log out</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session("status-danger"))

                    <div class="alert alert-danger container" role="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{session("status-danger")}}
                    </div>
                @elseif(session("status-success"))

                    <div class="alert alert-success container" role="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{session("status-success")}}
                    </div>
                @endif
        @yield('body')
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
                        </div>
                    </footer>
            </div>
        </div>


        <!-- partial -->
    </div>
    <!-- page-body-wrapper ends -->

</div>

{{--MODAL-1--}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">UYARI</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body modal-dialog-centered">

                <p class="modal-description mt-5" id="staticBackdropLabel">
                </p>

                <div class="container px-4 mt-5 ">
                    <h5 class="modal-title" id="staticBackdropLabel">Bu kaydı silmek istediğine emin misin?</h5>
                </div>
            </div>
            <hr>
            <div class="footer-item">
                <div class="p-2 float-end">
                    <a  class="btn btn-primary delete-but">Sil</a>
                    <button class="btn btn-danger cancel-but "  data-bs-dismiss="modal">Vazgeç</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--MODAL-2--}}
<div class="modal fade" id="staticBackdrop_pic" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close btn-close-white"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-dialog-centered">
                <div class="pop_image mb-3">
                    <img class="modal-image pop_image" src="" id="staticBackdropLabel">
                </div>
                <p class="modal-description mt-5" id="staticBackdropLabel">
                </p>

            </div>
        </div>
    </div>
</div>



<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
{{--<script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>--}}
{{--<script src="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>--}}
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/settings.js')}}"></script>
{{--<script src="{{asset('assets/js/todolist.js')}}"></script>--}}
<!-- endinject -->
<!-- Custom js for this page -->

<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>


<!-- End custom js for this page -->
{{--<script type="text/javascript">--}}

{{--    // var editor = CKEDITOR.replace( 'ckeditor123',{--}}
{{--    //       extraAllowedContent : 'div',--}}
{{--    //  });--}}
{{--    // CKEDITOR.config.extraPlugins = 'sourcedialog';--}}
{{--    //  CKEDITOR.config.source= false;--}}
{{--    // CKEDITOR.config.removePlugins = 'sourcearea';--}}
{{--    // CKEDITOR.config.allowedContent = 'true';--}}

{{--    // CKEDITOR.config.allowedContent = true;--}}

{{--    // CKEDITOR.replace("ckeditor123"), {--}}
{{--    //--}}
{{--    //     disableNativeSpellChecker : false,--}}
{{--    //     allowedContent : true,--}}
{{--    // }--}}
{{--    // CKEDITOR.replace("ckeditor"), {--}}
{{--    //     // customConfig: 'public/assests/CKconfig.js',--}}
{{--    //--}}
{{--    //--}}
{{--    // }--}}
{{--    //--}}
{{--    // $(document).ready(function () {--}}
{{--    //     $('.ckeditor').ckeditor();--}}
{{--    //     config.allowedContent = true;--}}
{{--    //--}}
{{--    // });--}}
{{--    // CKEDITOR.editorConfig = function( config )--}}
{{--    // {--}}
{{--    //     config.extraPlugins = 'first-page-header,first-page-footer,page-header,page-footer,hard-page-break';--}}
{{--    //     config.allowedContent = true;--}}
{{--    // };--}}

{{--    // ClassicEditor--}}
{{--    //     .create( document.querySelector( '#body' ))--}}
{{--    //     .catch( error => {--}}
{{--    //         console.error( error );--}}
{{--    //     } );--}}

    {{--</script>--}}

{{--   // var editor = CKEDITOR.replace( 'ckeditor123', {--}}
{{--   //      allowedContent: true,--}}
{{--   //      // plugins: 'wysiwygarea,toolbar,format',--}}
{{--   //      extraAllowedContent: '',--}}
{{--   //--}}
{{--   //  } );--}}
   <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script src=" {{ asset('assets/ckeditor/samples/js/sample.js') }}"></script>
<script>
    var editor1 = CKEDITOR.replace('ckeditor123', {
        extraAllowedContent: 'div',
        height: 150
    });

    var editorLang = CKEDITOR.replace('editorLang', {
        extraAllowedContent: 'div',
        height: 150
    });

    var editorInterests = CKEDITOR.replace('editorInterests', {
        extraAllowedContent: 'div',
        height: 150
    });

</script>




<script>
    let delete_but = $('.delete-but')
    $('.showButton').click(function (){

        $('.delete-but')[0].href = $(this)[0].href
        $('.delete-but').click(function (){
        });
    })
</script>

<script>
    let showPicture_smallpic = document.getElementById('showPicture')
    let modalBody_smallpic = document.getElementsByClassName('modal-body')
    let modalImage_smallpic = document.getElementsByClassName('modal-image')
    $('.showPicture').click(function (){
        modalImage_smallpic[0].src= $(this).attr('data-image') ;
        console.log($(this).attr('data-image'))
    });
    $('.modal').on('shown.bs.modal', function (e) {
        myInput.focus()
    });
    $('.modal').on('hidden.bs.modal', function (e) {

    });
</script>
@yield('js')
</body>
</html>
