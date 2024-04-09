{{-- This is our main home page file --}}
{{-- welcome.blade.php acts as main content which we yield here and in welcom.blade.php we need to extend this layout and fill the yield with section block --}}
{{-- similarly we have included sidebar here  --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pen-It | Bloggers Heaven</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}">

    <!-- Load Core CSS
    =====================================-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/core/bootstrap-3.3.7.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/core/animate.min.css') }}">

    <!-- Load Main CSS
    =====================================-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main/setting.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main/hover.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/color/pasific.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icon/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icon/et-line-font.css') }}">

    <!-- Load JS
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    WARNING: Respond.js doesn't work if you view the page via file://
    =====================================-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="topPage" data-spy="scroll" data-target=".navbar" data-offset="100">



    <!-- Page Loader ===================================== -->
    <div id="pageloader" class="bg-grad-animation-1">
        <div class="loader-item">
            <img src="{{ asset('frontend/assets/img/other/oval.svg') }}" alt="page loader">
        </div>
    </div>

    <a href="#page-top" class="go-to-top">
        <i class="fa fa-long-arrow-up"></i>
    </a>


    <!-- Navigation Area===================================== -->
    <nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="{{ asset('frontend/assets/img/logo/logo-default.png') }}" alt="logo">
                    Pen-It
                </a>
            </div>

            <div class="navbar-collapse collapse navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html" data-toggle="dropdown" class="dropdown-toggle color-light">Home </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5"
        data-image-src="{{ asset('frontend/assets/img/bg/img-bg-17.jpg') }}" data-positiony="1000">
        <div class="intro-body text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt50">
                        <h1 class="brand-heading font-montserrat text-uppercase color-light"
                            data-in-effect="fadeInDown">
                            Pen-It
                            <small class="color-light alpha7">Heaven for Bloggers!</small>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- Blog Area
        ===================================== -->
    <div id="blog" class="pt20 pb50">
        <div class="container">
            <div class="row">
                {{-- Main Content --}}
                @yield('main-content')
                {{-- Side bar --}}
                @include('frontend.layouts._sidebar')
            </div>
        </div>
    </div>


    <!-- Newsletter Area =====================================-->
    <div id="newsletter" class="bg-dark2 pt50 pb50">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <h4 class="color-light">
                        Newsletter
                    </h4>
                </div>

                <div class="col-md-10">
                    <form name="newsletter">
                        <div class="input-newsletter-container">
                            <input type="text" name="email" class="input-newsletter"
                                placeholder="enter your email address">
                        </div>
                        <a href="#" class="button button-sm button-pasific hover-ripple-out">Subscribe<i
                                class="fa fa-envelope"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Area
=====================================-->
    <footer id="footer" class="footer-one center-block bg-light pt50 pb30 ">
        <div class="container">
            <div class="row">

                <div class="col-md-2 col-xs-12 mb25">
                    <div class="navbar-brand-footer center-block">Pen-It</div>
                    <div class="copyright center-block">&copy; 2020. All rights reserved.</div>
                </div>

                <div class="col-md-8 col-xs-12 text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class=" bb-solid-1">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Post</a></li>
                            </ul>
                        </div>

                        <div class="col-sm-12 mt25">
                            <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Knowledgebase</a></li>
                                <li><a href="#">Term of Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-xs-12">
                    <div class="social-container">
                        <ul class="footer-social text-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </footer>


    <!-- JQuery Core
=====================================-->
    <script src="{{ asset('frontend/assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/core/bootstrap-3.3.7.min.js') }}"></script>

    <!-- Magnific Popup
=====================================-->
    <script src="{{ asset('frontend/assets/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/magnific-popup/magnific-popup-zoom-gallery.js') }}"></script>

    <!-- JQuery Main
=====================================-->
    <script src="{{ asset('frontend/assets/js/main/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main/main.js') }}"></script>

</body>

</html>
