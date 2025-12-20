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
                                    <img class="logo-mobile" src="images/Icon VSATLink.png" alt="">
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item {{ $page === 'home' ? 'active' : '' }}"
                                    href="{{ $page === 'home' ? '#hero' : '/' }}">Beranda</a></li>
                            <li><a class="menu-item" href="{{ $page === 'home' ? '' : '/' }}#tentang">Tentang</a></li>
                            <li><a class="menu-item" href="{{ $page === 'home' ? '' : '/' }}#produk">Produk</a></li>
                            <li><a class="menu-item" href="{{ $page === 'home' ? '' : '/' }}#faq">FAQ</a></li>
                            <li><a class="menu-item {{ $page === 'login' ? 'd-none' : '' }}" href="/pesanan">Pesanan</a>
                            </li>
                            <li><a class="menu-item {{ $page === 'login' ? 'd-none' : '' }}"
                                    href="/aktivasi">Aktivasi</a></li>
                            <li class="mobile-only"><a class="menu-item" href="/profil">Profil</a></li>
                            <li class="mobile-only"><a class="menu-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            {{-- <a href="/login" class="btn-main btn-line"><span>Masuk</span></a> --}}
                            <div class="dropdown d-none d-md-block">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <span>Agil ArRachman</span>
                                </a>
                                <ul
                                    class="dropdown-menu w-full !bg-gray-900/40 backdrop-blur-md border !border-white/20 mt-3 me-0">
                                    <li>
                                        <a class="dropdown-item" href="/profil">
                                            <i class="fa fa-user me-2"></i> Profil
                                        </a>
                                    </li>
                                    <hr class="w-full !my-3 border-t border-white/40">
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>