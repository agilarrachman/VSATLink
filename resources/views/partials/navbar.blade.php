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
                                    <img class="logo-main" src="/images/Logo VSATLink.png" alt="">
                                    <img class="logo-mobile" src="/images/Icon VSATLink.png" alt="">
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
                            @auth
                                <li><a class="menu-item {{ $page === 'login' ? 'd-none' : '' }}" href="/pesanan">Pesanan</a>
                                </li>
                                <li><a class="menu-item {{ $page === 'login' ? 'd-none' : '' }}"
                                        href="/aktivasi">Aktivasi</a></li>
                                <li class="md:!hidden"><a class="menu-item" href="/profil">Profil</a></li>
                                <li class="md:!hidden"><a class="menu-item" href="/logout">Logout</a></li>
                            @endauth
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            @auth
                                <div class="dropdown d-none d-md-block">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <span>{{ auth()->user()->name }}</span>
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
                                            <form action="/logout" method="post" class="bg-transparent"
                                                onsubmit="return confirm('Apakah kamu yakin akan keluar dari akun kamu?')">
                                                @csrf
                                                <button
                                                    class="dropdown-item bg-transparent text-white !text-base !justify-start"
                                                    type="submit">
                                                    <i class="fa fa-sign-out-alt me-2.5"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a href="/login" class="btn-main btn-line"><span>Masuk</span></a>
                            @endauth

                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
