<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>@yield('title') | {{ Config::get('settings.sitename') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Social Media Realtor Website">
    <meta name="author" content="Jay Lara - InnovationGuys.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="{{ url('assets/css/headers/header-default.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/footers/footer-v1.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ url('assets/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/line-icons/line-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/parallax-slider/css/parallax-slider.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/owl-carousel/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/sweetalert-master/dist/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/sweetalert-master/themes/google/google.css') }}">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="{{ url('assets/css/theme-colors') }}{{$theme_color ? "/".$theme_color.".css" : "/dark-blue.css"}}">
    <link rel="stylesheet" href="{{ url('assets/css/theme-skins/dark.css') }}">

    <!-- CSS User -->
    <link rel="stylesheet" href="{{ url('assets/css/pages/profile.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pages/page_user_sidebar.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pages/page_user_tabs.css')}}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">
     @yield('css')
</head>

<body>
    <div class="wrapper">
        <!--=== Header ===-->
        <div class="header">
            <div class="container">
                <!-- Logo -->
                <a class="logo" href="{{ url('/home') }}">
                    <img src="{{ url('assets/images/logos/bw-color-logo-whitebg.png') }}" alt="Logo" class='header-logo'>
                </a>
                <!-- End Logo -->

                <!-- Topbar -->
                <div class="topbar">
                    <ul class="loginbar pull-right">
                        <li><a href="page_faq.html">Help</a></li>
                        <li class="topbar-devider"></li>
                        @if(Auth::guest())
                            <li class="hoverSelector">
                                <a href="{{ url('/login') }}">Login</a>
                                <!-- <ul class="languages hoverSelectorBlock">
                                    <li><a href="{{ url('/login') }}">Buyer</i></a></li>
                                    <li><a href="{{ url('/login') }}">Seller</a></li>
                                    <li><a href="{{ url('/login') }}">Realtor</a></li>
                                    <li><a href="{{ url('/login') }}">Lender</a></li>
                                </ul> -->
                            </li>
                            <li class="topbar-devider"></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li><a href="{{ url('user/dashboard')}}">{{ Auth::user()->username ?: Auth::user()->name }}</a></li>
                            <li class="topbar-devider"></li>
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </div>
                <!-- End Topbar -->

                <!-- Toggle get grouped for better mobile display -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>
                <!-- End Toggle -->
            </div><!--/end container-->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{ url('/home') }}">
                                Home
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Our Listings
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="page_about2.html">Lehi</a></li>
                                <li><a href="page_about3.html">Saratoga Springs</a></li>
                                <li><a href="page_about1.html">Eagle Mountain</a></li>
                                <li><a href="page_about.html">American Fork</a></li>
                                <li><a href="page_about_me.html">Provo</a></li>
                                <li><a href="page_about_me1.html">Orem</a></li>
                                <li><a href="page_about_me2.html">Springville</a></li>
                                <li><a href="page_about_our_team.html">Spanish Fork</a></li>
                                <li><a href="page_about_our_team1.html">Payson</a></li>
                                <li><a href="page_about_our_team2.html">All Listings</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Our People
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('realtor/realtor->name') }}">Brett Wilde</a>
                                </li>
                                <li>
                                    <a href="{{ url('realtor/realtor->name') }}">Preston</a>
                                </li>
                                <li>
                                    <a href="{{ url('realtor/realtor->name') }}">David Taylor</a>
                                </li>
                                <li>
                                    <a href="{{ url('realtor/realtor->name') }}">Falon</a>
                                </li>
                                <li>
                                    <a href="{{ url('realtor/realtor->name') }}">Greg Phillips</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/area') }}">
                                Our Area
                            </a>

                        </li>
                        <li>
                            <a href="{{ url('/blog') }}">
                                Blog
                            </a>
                        </li>

                        <!-- Search Block -->
                        <li>
                            <i class="search fa fa-search search-btn"></i>
                            <div class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="button">Go</button>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <!-- End Search Block -->
                    </ul>
                </div><!--/end container-->
            </div><!--/navbar-collapse-->
        </div>
        <!--=== End Header ===-->








