@extends('layouts.app')

@section('title', 'VSATLink - Solusi Internet Satelit Cepat dan Handal')

@section('content')
    <style>
        .image-miner {
            filter: brightness(0.6);
        }

        .image-frontier {
            filter: brightness(0.4) contrast(1.1);
        }
    </style>
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <!-- section begin -->
        <section id="subheader" class="jarallax">
            <div class="de-gradient-edge-bottom"></div>
            <img src="/storage/{{ $product->image_url }}"
                class="jarallax-img {{ $product->slug === 'miner' ? 'image-miner' : ($product->slug === 'frontier' ? 'image-frontier' : '') }}"
                alt="{{ $product->name }}" />
            <div class="container z-1000">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        @if ($product->is_promo)
                            <div class="subtitle blink wow fadeInUp mb-3">
                                Penawaran Spesial
                            </div>
                        @endif
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">
                            {{ $product->name }}
                        </h2>
                        <p>{{ $product->description }}</p>
                        <div class="sw-price wow fadeInUp">
                            <div class="d-starting">Biaya Perangkat</div>
                            <div class="d-price">
                                <span class="d-cur">Rp</span>
                                <span class="d-val">{{ number_format($product->otc_cost, 0, ',', '.') }}</span>
                            </div>
                            <div class="spacer-10"></div>
                            <button class="btn-main mb10" id="openMapBtnTop">
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section class="no-top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="subtitle wow fadeInUp mb-3">
                            Apa yang Kamu Dapatkan
                        </div>
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">
                            Mengapa Memilih Paket Ini
                        </h2>
                    </div>

                    <div class="col-lg-5"></div>

                    <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-delay="0s">
                        <div>
                            <img src="/images/icons/speed.png" class="mb20" alt="" />
                            <h4>{{ $product->performance_benefit_title }}</h4>
                            <p>{{ $product->performance_benefit_description }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-delay=".2s">
                        <div>
                            <img src="/images/icons/globe.png" class="mb20" alt="" />
                            <h4>{{ $product->connectivity_benefit_title }}</h4>
                            <p>{{ $product->connectivity_benefit_description }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-delay=".4s">
                        <div>
                            <img src="/images/icons/group.png" class="mb20" alt="" />
                            <h4>{{ $product->segmentation_benefit_title }}</h4>
                            <p>{{ $product->segmentation_benefit_description }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 wow fadeInRight" data-wow-delay=".6s">
                        <div>
                            <img src="/images/icons/up graph.png" class="mb20" alt="" />
                            <h4>{{ $product->added_value_benefit_title }}</h4>
                            <p>{{ $product->added_value_benefit_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-top" id="spesifikasiLayanan">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="subtitle wow fadeInUp mb-3">
                            Spesifikasi dan Layanan
                        </div>
                    </div>

                    <div class="col-lg-5"></div>

                    <div class="col-lg-6 col-sm-12 wow fadeInRight" data-wow-delay="0s">
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">
                            Perangkat
                        </h2>
                        <ul class="ps-0">
                            <li>{{ $product->antena }}</li>
                            <li>{{ $product->lnb }}</li>
                            <li>{{ $product->buc }}</li>
                            <li>{{ $product->modem }}</li>
                            @if ($product->access_point)
                                <li>{{ $product->access_point }}</li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-lg-6 col-sm-12 wow fadeInRight" data-wow-delay="0s">
                        <h2 class="wow fadeInUp mb20" data-wow-delay=".2s">
                            Layanan & Kapasitas
                        </h2>
                        <div class="d-flex">
                            <div class="name me-2">
                                <p>Kuota Data</p>
                                <p>Biaya Layanan</p>
                                <p>Kecepatan</p>
                                <p>Masa Layanan</p>
                                <p>Free Airtime</p>
                            </div>
                            <div class="separators me-2">
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                                <p>:</p>
                            </div>
                            <div class="value">
                                <p>{{ $product->monthly_quota }} GB/bulan</p>
                                <p>Rp{{ number_format($product->mrc_cost, 0, ',', '.') }}/bulan</p>
                                <p>{{ $product->speed }}</p>
                                <p>{{ $product->subscription_duration }} bulan</p>
                                <p>{{ $product->free_airtime }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="no-top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="subtitle wow fadeInUp mb-3">
                            Metode Pembayaran dan Pemesanan
                        </div>
                    </div>

                    <div class="col-lg-5"></div>

                    <div class="col-lg-6 col-sm-12 wow fadeInRight" data-wow-delay="0s">
                        <div class="w-75">
                            <div class="col-lg-12">
                                <h2 class="wow fadeInUp" data-wow-delay=".2s">
                                    Kami Menerima
                                </h2>
                                <p class="wow fadeInUp" data-wow-delay=".3s">
                                    Nikmati kemudahan pembayaran layanan
                                    VSATLink melalui berbagai metode yang aman
                                    dan terpercaya
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-sm-2 col-4">
                                        <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                            <img src="/images/payments/visa.webp" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-4">
                                        <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                            <img src="/images/payments/mastercard.webp" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-4">
                                        <div class="p-2 rounded-10" data-bgcolor="rgba(255, 255, 255, .05)">
                                            <img src="/images/payments/paypal.webp" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-4">
                                        <div class="p-2 rounded-10 d-flex" data-bgcolor="rgba(255, 255, 255, .05)"
                                            style="height: 100%">
                                            <img src="/images/payments/qris.png
                                        "
                                                class="img-fluid m-auto" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-4">
                                        <div class="p-2 rounded-10 d-flex" data-bgcolor="rgba(255, 255, 255, .05)"
                                            style="height: 100%">
                                            <img src="/images/payments/indomaret.png" class="img-fluid m-auto"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-4">
                                        <div class="p-2 rounded-10 d-flex" data-bgcolor="rgba(255, 255, 255, .05)"
                                            style="height: 100%">
                                            <img src="/images/payments/alfamart.png" class="img-fluid m-auto"
                                                alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sw-price col-lg-6 col-sm-12 wow fadeInRight" data-wow-delay="0s">
                        <p class="mb-3" style="font-size: 20px">Biaya Perangkat</p>
                        <div class="d-price">
                            <span class="d-cur" style="color: white">Rp</span>
                            <span class="d-val">{{ number_format($product->otc_cost, 0, ',', '.') }}</span>
                        </div>
                        <p style="color: #92939e; margin-bottom: 0">
                            *Harga yang tercantum belum termasuk pajak dan biaya
                            lainnya
                        </p>
                        <div class="spacer-10"></div>
                        <button class="btn-main mb10" id="openMapBtnBottom">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div id="mapModal" class="fixed inset-0 bg-black/25 hidden items-center justify-center z-[9999]">
            <div
                class="bg-gray-900/40 backdrop-blur-md border !border-white/20 rounded-sm w-full max-w-[750px] p-6 relative mx-3">
                <h4 class="mb-4 text-center">Lokasi Instalasi & Aktivasi</h4>

                <div id="leafletMap" class="w-full h-[300px] rounded-lg border border-white/20 mb-4"></div>

                <form action="/create-order" method="POST">
                    @csrf
                    <div class="mb-4 text-sm text-white/80">
                        <div class="myaddress flex items-center mb-2">
                            <input class="form-check-input me-2" type="checkbox" value="" id="myaddress">
                            <label class="form-check-label text-white" for="myaddress">
                                Gunakan Alamat Saya
                            </label>
                        </div>

                        <div class="flex flex-col md:flex-row justify-between">
                            <p class="text-white font-semibold">Latitude: </p>
                            <span class="text-white" id="latText">-</span>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between">
                            <p class="text-white font-semibold">Longitude: </p>
                            <span class="text-white" id="lngText">-</span>
                        </div>
                        <div class="flex flex-col md:flex-row justify-between">
                            <p class="text-white font-semibold">Google Maps Link: </p>
                            <a id="gmapsLink" href="#" target="_blank" class="text-white underline break-all">
                                -
                            </a>
                        </div>
                    </div>

                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <div class="flex flex-col md:flex-row gap-3">
                        <button id="cancelBtn" type="button"
                            class="font-bold !text-sm text-white !uppercase !rounded-[5px] !font-['Oxanium',Helvetica,Arial,sans-serif] w-full md:w-1/2 px-4 py-2 !bg-[#9692A0] hover:!bg-[#898592]">
                            Batalkan
                        </button>

                        <button id="submitOrderBtn" type="submit" class="btn-main w-full md:w-1/2">
                            Buat Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('mapModal');
        const openBtnTop = document.getElementById('openMapBtnTop');
        const openBtnBottom = document.getElementById('openMapBtnBottom');
        const cancelBtn = document.getElementById('cancelBtn');
        const submitBtn = document.getElementById('submitOrderBtn');

        const userLat = @json(auth()->user()->latitude);
        const userLng = @json(auth()->user()->longitude);
        const myAddressCheckbox = document.getElementById('myaddress');

        const latText = document.getElementById('latText');
        const lngText = document.getElementById('lngText');
        const latInput = document.getElementById('latitude');
        const lngInput = document.getElementById('longitude');

        function generateGoogleMapsLink(lat, lng) {
            return `https://www.google.com/maps?q=${lat},${lng}`;
        }

        let map, marker;

        document.getElementById('openMapBtnTop').addEventListener('click', openModal);
        document.getElementById('openMapBtnBottom').addEventListener('click', openModal);

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(initMap, 100);
        }

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        function initMap() {
            if (map) return;

            const defaultLat = -6.602234321160505;
            const defaultLng = 106.80913996183654;

            map = L.map('leafletMap').setView([defaultLat, defaultLng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            marker = L.marker([defaultLat, defaultLng]).addTo(map);

            updateLatLng(defaultLat, defaultLng);

            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                updateLatLng(e.latlng.lat, e.latlng.lng);
                myAddressCheckbox.checked = false;
            });
        }

        function updateLatLng(lat, lng) {
            const fixedLat = lat.toFixed(6);
            const fixedLng = lng.toFixed(6);

            latText.innerText = fixedLat;
            lngText.innerText = fixedLng;

            latInput.value = lat;
            lngInput.value = lng;

            const gmapsUrl = generateGoogleMapsLink(fixedLat, fixedLng);

            const gmapsAnchor = document.getElementById('gmapsLink');
            gmapsAnchor.href = gmapsUrl;
            gmapsAnchor.innerText = gmapsUrl;
        }

        submitBtn.addEventListener('click', () => {
            if (!latInput.value || !lngInput.value) {
                alert('Silakan pilih lokasi di map');
                return;
            }

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        myAddressCheckbox.addEventListener('change', function() {
            if (this.checked) {
                if (userLat === null || userLng === null) {
                    alert('Alamat Anda belum tersimpan');
                    this.checked = false;
                    return;
                }

                // pindahkan map & marker ke alamat user
                const lat = parseFloat(userLat);
                const lng = parseFloat(userLng);

                map.setView([lat, lng], 17);
                marker.setLatLng([lat, lng]);

                updateLatLng(lat, lng);
            }
        });
    </script>
@endsection
