<header class="transparent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="/">
                                    <img class="logo-main" src="images/Logo VSATLink.png" alt="">
                                    <img class="logo-mobile" src="images/Icon VSATLink.png" alt="" >
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item {{ ($page === 'home') ? 'active' : '' }}" href="{{ ($page === 'home') ? '#hero' : '/' }}">Beranda</a></li>
                            <li><a class="menu-item" href="{{ ($page === 'home') ? '' : '/' }}#tentang">Tentang</a></li>
                            <li><a class="menu-item" href="{{ ($page === 'home') ? '' : '/' }}#produk">Produk</a></li>
                            <li><a class="menu-item" href="{{ ($page === 'home') ? '' : '/' }}#faq">FAQ</a></li>
                            <li><a class="menu-item {{ ($page === 'login') ? 'd-none' : '' }}" href="/pesanan">Pesanan</a></li>
                            <li><a class="menu-item {{ ($page === 'login') ? 'd-none' : '' }}" href="/aktivasi">Aktivasi</a></li>
                            <li><a class="menu-item {{ ($page === 'login') ? 'd-none' : '' }}" href="/profil">Profil</a></li>
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