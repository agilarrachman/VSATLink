@extends('layouts.app')

@section('title', 'VSATLink - Solusi Internet Satelit Cepat dan Handal')

@section('content')
    <script>
        navLinks.forEach((link) => {
            link.addEventListener("click", function(e) {
                e.preventDefault();

                const targetId = this.getAttribute("href");
                if (targetId.startsWith("/#") || targetId.startsWith("#")) {
                    const targetSection = document.querySelector(targetId);
                    if (targetSection) {
                        navLinks.forEach((item) => item.classList.remove("active"));
                        this.classList.add("active");

                        window.scrollTo({
                            top: targetSection.offsetTop - 80,
                            behavior: "smooth",
                        });
                    }
                }
            });
        });
    </script>

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="no-top no-bottom position-relative z-1000" id="swiper">
            <div class="v-center">
                <div id="hero" class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($promo_products as $promo_product)
                            <div class="swiper-slide">
                                <div class="swiper-inner" data-bgimage="url(storage/{{ $promo_product->image_url }})">
                                    <div class="sw-caption">
                                        <div class="container">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-8 mb-sm-30">
                                                    <div class="subtitle blink mb-4">Penawaran Spesial</div>
                                                    <h1 class="slider-title text-uppercase mb-1">{{ $promo_product->name }}
                                                    </h1>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p class="slider-text">{{ $promo_product->description }}</p>
                                                    <div class="sw-price wow fadeInUp">
                                                        <div class="d-starting">
                                                            Biaya Perangkat
                                                        </div>
                                                        <div class="d-price">
                                                            <span class="d-cur">Rp</span>
                                                            <span
                                                                class="d-val">{{ number_format($promo_product->otc_cost, 0, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="spacer-10"></div>
                                                    <a class="btn-main mb10" href="pricing-table-one.html"><span>Pesan
                                                            Sekarang</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sw-overlay"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Keunggulan Kami</div>
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">Solusi internet satelit yang cepat dan andal</h2>
                    </div>

                    <div class="col-lg-6"></div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay="0s">
                        <div>
                            <img src="images/icons/1.png" class="mb20" alt="">
                            <h4>Koneksi Cepat & Stabil</h4>
                            <p>Nikmati internet satelit berkecepatan tinggi dan koneksi stabil untuk mendukung bisnis Anda
                                di mana pun</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay=".2s">
                        <div>
                            <img src="images/icons/2.png" class="mb20" alt="">
                            <h4>Jangkauan Seluruh Indonesia</h4>
                            <p>Dari kota besar hingga daerah terpencil, menghadirkan koneksi internet tanpa batas wilayah,
                                solusi tanpa jaringan fiber</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay=".4s">
                        <div>
                            <img src="images/icons/3.png" class="mb20" alt="">
                            <h4>Layanan Aman & Terpercaya</h4>
                            <p>Kami menjamin keamanan data dan privasi pelanggan dengan sistem enkripsi dan pengawasan
                                jaringan 24 jam</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-sm-20 wow fadeInRight" data-wow-delay=".6s">
                        <div>
                            <img src="images/icons/4.png" class="mb20" alt="">
                            <h4>Dukungan Teknis Profesional</h4>
                            <p>Tim teknis kami siap membantu Anda dengan dukungan cepat, ramah, dan berpengalaman di bidang
                                satelit</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-bottom" id="tentang">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="padding60 sm-padding40 sm-p-2 jarallax position-relative">
                            <img src="images/background/jarralax.png" class="jarallax-img" alt="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="subtitle wow fadeInUp mb-3">Tentang Kami</div>
                                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Membangun Konektivitas Tanpa Batas</h2>
                                    <p class="wow fadeInUp" style="color: white">VSATLink adalah penyedia layanan internet
                                        satelit yang berfokus menghadirkan koneksi cepat, stabil, dan menjangkau seluruh
                                        wilayah Indonesia, bahkan di daerah tanpa jaringan fiber</p>
                                    <div class="spacer-10"></div>
                                </div>
                            </div>

                            <img src="images/misc/VSAT no bg.png"
                                class="me-5 sm-hide position-absolute bottom-0 end-0 wow fadeIn" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-bottom">
            <div class="container">
                <div class="row align-items-center gx-5">
                    <div class="col-lg-6" style="max-height: 380px">
                        <img src="images/misc/map indo.png" class="img-fluid mb-sm-30 wow fadeIn" alt=""
                            style="object-fit:cover;">
                    </div>

                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Area Cakupan</div>
                        <h2 class="wow fadeInUp" data-wow-delay=".2s"><span class="text-gradient">100+</span> lokasi
                            layanan VSATLink di seluruh Indonesia</h2>
                        <p class="wow fadeInUp">VSATLink menjangkau berbagai wilayah dari perkotaan hingga pelosok
                            nusantara. Kami memastikan koneksi internet tetap cepat dan stabil, bahkan di area tanpa
                            jaringan kabel atau fiber</p>

                        <ul class="de-server s2 wow fadeInUp">
                            <li>Jakarta, Jawa</li>
                            <li>Medan, Sumatera</li>
                            <li>Makassar, Sulawesi</li>
                            <li>Balikpapan, Kalimantan</li>
                            <li>Denpasar, Bali</li>
                            <li>Jayapura, Papua</li>
                            <li>Ambon, Maluku</li>
                            <li>Dan wilayah lainnya</li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>

        <section class="jarallax" id="produk">
            <img src="images/background/jarralax.png" class="jarallax-img" alt="">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <div class="container z-1000">
                <div class="col-12">
                    <div class="subtitle wow fadeInUp mb-3">Paket Produk</div>
                    <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">Yang Kami Tawarkan</h2>
                </div>
                <div class="row g-4 sequence">
                    @foreach ($products as $product)
                        <div class="col-md-6 gallery-item" id="card">
                            <div class="de-item wow h-100">
                                <div class="d-overlay">
                                    <div class="d-label">
                                        @if ($product->is_promo)
                                            <i class="fa fa-gift"></i> Penawaran Spesial
                                        @endif
                                    </div>
                                    <div class="d-text">
                                        <h4>{{ $product->name }}</h4>
                                        <div class="detail-info">
                                            <p class="d-info">Kapasitas Kuota Bulanan <span
                                                    class="info">{{ $product->monthly_quota }} GB/bulan</span></p>
                                            <p class="d-info">Kecepatan Akses <span
                                                    class="info">{{ $product->speed }}</span></p>
                                            <p class="d-info">Cocok Untuk <span
                                                    class="info">{{ $product->segmentation }}</span></p>
                                        </div>
                                        <p class="d-price">Harga Perangkat <span
                                                class="price">Rp{{ number_format($product->otc_cost, 0, ',', '.') }}</span>
                                        </p>
                                        <p class="d-price">Harga Layanan <span
                                                class="price">Rp{{ number_format($product->mrc_cost, 0, ',', '.') }}</span>
                                        </p>
                                        <a class="btn-main btn-fullwidth"
                                            href="/detail-produk/{{ $product->slug }}"><span>Lihat Detail</span></a>
                                    </div>
                                </div>
                                <img src="storage/{{ $product->image_url }}" class="img-fluid "
                                    alt="{{ $product->name }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="no-top no-bottom" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subtitle wow fadeInUp mb-3">Butuh Bantuan?</div>
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">Pertanyaan Umum</h2>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-6">
                        <div class="accordion s2 wow fadeInUp">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-a1">
                                    Apa itu layanan VSAT?
                                </div>
                                <div class="accordion-section-content" id="accordion-a1">
                                    <p>VSAT (Very Small Aperture Terminal) adalah layanan internet satelit yang memungkinkan
                                        koneksi data di area tanpa jaringan kabel atau fiber optik.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-a2">
                                    Di mana saja layanan VSATLink tersedia?
                                </div>
                                <div class="accordion-section-content" id="accordion-a2">
                                    <p>VSATLink menjangkau seluruh wilayah Indonesia, termasuk daerah terpencil di mana
                                        jaringan fiber belum tersedia.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-a3">
                                    Apa keunggulan layanan VSATLink?
                                </div>
                                <div class="accordion-section-content" id="accordion-a3">
                                    <p>Koneksi cepat dan stabil, jangkauan luas, keamanan tinggi, serta dukungan teknis
                                        profesional 24 jam.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-a4">
                                    Apakah VSATLink cocok untuk bisnis?
                                </div>
                                <div class="accordion-section-content" id="accordion-a4">
                                    <p>Ya, layanan kami dirancang untuk mendukung kebutuhan komunikasi dan data bisnis,
                                        pemerintahan, maupun pribadi di area terpencil.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-a5">
                                    Bagaimana cara berlangganan VSATLink?
                                </div>
                                <div class="accordion-section-content" id="accordion-a5">
                                    <p>Anda dapat mengisi formulir pemesanan di situs kami atau menghubungi tim sales untuk
                                        mendapatkan penawaran dan proses instalasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="accordion s2 wow fadeInUp">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-b1">
                                    Berapa lama proses instalasi?
                                </div>
                                <div class="accordion-section-content" id="accordion-b1">
                                    <p>Waktu instalasi biasanya antara 3–7 hari kerja tergantung lokasi dan kondisi
                                        lapangan.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-b2">
                                    Apakah layanan tersedia 24 jam?
                                </div>
                                <div class="accordion-section-content" id="accordion-b2">
                                    <p>Ya, layanan VSATLink beroperasi 24 jam dengan pemantauan jaringan dan dukungan teknis
                                        nonstop.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-b3">
                                    Apakah koneksi VSAT bisa digunakan untuk CCTV atau VPN?
                                </div>
                                <div class="accordion-section-content" id="accordion-b3">
                                    <p>Tentu, jaringan VSATLink mendukung penggunaan untuk CCTV, VPN, dan kebutuhan data
                                        lainnya sesuai konfigurasi.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-b4">
                                    Bagaimana jika terjadi gangguan koneksi?
                                </div>
                                <div class="accordion-section-content" id="accordion-b4">
                                    <p>Tim teknis kami siap membantu melalui layanan dukungan 24 jam untuk memastikan
                                        koneksi Anda tetap aktif dan stabil.</p>
                                </div>

                                <div class="accordion-section-title" data-tab="#accordion-b5">
                                    Apakah ada paket khusus untuk perusahaan?
                                </div>
                                <div class="accordion-section-content" id="accordion-b5">
                                    <p>Ya, kami menyediakan paket korporasi dengan bandwidth khusus, prioritas dukungan, dan
                                        opsi konfigurasi sesuai kebutuhan bisnis Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-4">
                        <div class="subtitle wow fadeInUp mb-3">Metode Pembayaran</div>
                        <h2 class="wow fadeInUp" data-wow-delay=".2s">Kami Menerima</h2>
                        <p class="wow fadeInUp" data-wow-delay=".3s">
                            Nikmati kemudahan pembayaran layanan VSATLink melalui berbagai metode yang aman dan terpercaya
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/visa.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/mastercard.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                    <img src="images/payments/paypal.webp" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10 d-flex" data-bgcolor="rgba(255, 255, 255, .05)"
                                    style="height: 100%">
                                    <img src="images/payments/qris.png
                                "
                                        class="img-fluid m-auto" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10 d-flex" data-bgcolor="rgba(255, 255, 255, .05)"
                                    style="height: 100%">
                                    <img src="images/payments/indomaret.png" class="img-fluid m-auto" alt="">
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <div class="p-2 rounded-10 d-flex" data-bgcolor="rgba(255, 255, 255, .05)"
                                    style="height: 100%">
                                    <img src="images/payments/alfamart.png" class="img-fluid m-auto" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
