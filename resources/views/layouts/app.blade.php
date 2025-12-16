<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title', 'VSATLink - Solusi Internet Satelit Cepat dan Handal')</title>
    <link rel="icon" href="images/icon VSATLink.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Playhost - Game Hosting Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="css/plugins.css" rel="stylesheet" type="text/css" >
    <link href="css/swiper.css" rel="stylesheet" type="text/css" >
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link href="css/coloring.css" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" >
    <!-- icon -->
    <link href="fonts/fontawesome4/css/all.min.css" rel="stylesheet">
    <link href="fonts/fontawesome6/css/all.min.css" rel="stylesheet">
    <link href="fonts/et-line-font/style.css" rel="stylesheet">
    <link href="fonts/elegant_font/HTML_CSS/style.css" rel="stylesheet">
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="dark-scheme">
    <div id="wrapper">
        <div class="float-text show-on-scroll">
            <span><a href="#">Scroll to top</a></span>
        </div>
        <div class="scrollbar-v show-on-scroll"></div>
        <!-- page preloader begin -->
        <div id="de-loader"></div>
        <!-- page preloader close -->

        <!-- header begin -->
        @include('partials.navbar')
        <!-- header close -->
        <!-- content begin -->
        @yield('content')
        <!-- content close -->
        
        <!-- footer begin -->
        @include('partials.footer')
        <!-- footer close -->
    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="js/script.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src="js/swiper.js"></script>
    <script src="js/custom-marquee.js"></script>
    <script src="js/custom-swiper-1.js"></script>

</body>

</html>