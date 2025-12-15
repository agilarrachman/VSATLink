<!DOCTYPE html>
<html lang="en">

<head>
    <title>Masuk | VSATLink</title>
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
    <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" >
    <!-- icon -->
    <link href="fonts/fontawesome4/css/all.min.css" rel="stylesheet">
    <link href="fonts/fontawesome6/css/all.min.css" rel="stylesheet">
    <link href="fonts/et-line-font/style.css" rel="stylesheet">
    <link href="fonts/elegant_font/HTML_CSS/style.css" rel="stylesheet">

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
        <header class="transparent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="index.html">
                                            <img class="logo-main" src="images/Logo VSATLink.png" alt="">
                                            <img class="logo-mobile" src="images/Icon VSATLink.png" alt="" >
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="/">Beranda</a></li>
                                    <li><a class="menu-item" href="/#tentang">Tentang</a></li>
                                    <li><a class="menu-item" href="/#produk">Produk</a></li>
                                    <li><a class="menu-item" href="/#faq">FAQ</a></li>
                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <a href="/login" class="btn-main btn-line"><span>Masuk</span></a>
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
            <section class="v-center jarallax" style="padding: 150px 0">
                <div class="de-gradient-edge-top"></div>
                <div class="de-gradient-edge-bottom"></div>
                <img src="images/background/jarralax.png" class="jarallax-img" alt="">
                <div class="container z-1000">
                        <div class="row align-items-center">
                            <div class="col-lg-4 offset-lg-4">
                                <div class="padding40 rounded-10 shadow-soft bg-dark-1">
                                    <div class="text-center">
                                        <h4>Masuk ke Akun Anda</h4>
                                        <p>Login untuk berbelanja paket internet satelit terbaik dan kelola pesanan Anda</p>
                                    </div>
                                    <div class="spacer-10"></div>
                                    <form id="form_register" class="form-border" method="post" action="index.html">
                                        <div class="field-set">
                                            <label>Username</label>
                                            <input type='text' name='name' id='name' class="form-control">
                                        </div>
                                        <div class="field-set">
                                            <label>Password</label>
                                            <input type='text' name='password' id='password' class="form-control">
                                        </div>
                                        <div class="field-set">
                                            <input type="checkbox" checked id="html" name="fav_language" value="HTML">
                                            <label for="html"><span class="op-5">Ingat saya</span></label><br>
                                        </div>
                                        <div class="spacer-20"></div>
                                        <div id="submit">
                                            <input type="submit" id="send_message" value="Sign In" class="btn-main btn-fullwidth rounded-3" />
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <!-- content close -->
        <!-- footer begin -->
        @include('partials.footer')
        <!-- footer close -->
    </div>


    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src="js/custom-marquee.js"></script>
</body>

</html>