@extends('layouts.app')

@section('title', 'Pesanan Saya | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="/images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="content z-1000 mt-14 mx-auto">
                @if (session()->has('success'))
                    <div class="alert text-white bg-gray-900/40 backdrop-blur-md border !border-white/20 alert-dismissible fade show mb-5 text-left"
                        role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div
                    class="container shadow-lg/10 rounded-10 bg-gray-900/40 backdrop-blur-md border !border-white/20 !p-10">
                    <div class="flex flex-col md:flex-row gap-9">
                        <div class="col md:w-1/2 flex flex-col gap-9">
                            <div class="detail">
                                <h4 class="!mb-8">Rincian Pesanan</h4>
                                <div class="flex items-start gap-4">
                                    <img src="/storage/{{ $order->product->image_url }}" alt="{{ $order->product->name }}"
                                        class="rounded-md object-cover w-[120px]" />
                                    <div class="info w-full mb-3 mb-md-0">
                                        @php($badge = $order->statusBadge())
                                        <div class="status px-3 py-1 rounded-full w-fit mb-2 {{ $badge['class'] }}">
                                            <p class="text-sm mb-0">{{ $badge['label'] }}</p>
                                        </div>
                                        <p class="mb-0 text-base text-white">
                                            Kode Pesanan: {{ $order->unique_order }}
                                        </p>
                                        <h4 class="mb-0">{{ $order->product->name }}</h4>
                                        <p class="mb-0 text-base">
                                            Pesanan dibuat pada tanggal {{ $order->created_at->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="summary my-3">
                                    <div class="flex justify-between">
                                        <h4>Jenis Pengiriman</h4>
                                        <p class="text-right text-white">{{ $order->shipping ? $order->shipping : '-' }}</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <h4>Harga</h4>
                                        <p class="text-right text-white">
                                            {{ $order->product_cost ? 'Rp' . number_format($order->product_cost, 0, ',', '.') : '-' }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between">
                                        <h4>Biaya Pengiriman</h4>
                                        <p class="text-right text-white">
                                            {{ $order->shipping_cost ? 'Rp' . number_format($order->shipping_cost, 0, ',', '.') : '-' }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between">
                                        <h4>Biaya Instalasi</h4>
                                        <p class="text-right text-white">
                                            {{ $order->installation_service_cost == 0 && $order->installation_transport_cost == 0
                                                ? '-'
                                                : 'Rp ' . number_format($order->installation_service_cost + $order->installation_transport_cost, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between">
                                        <h4>PPN (10%)</h4>
                                        <p class="text-right text-white">
                                            {{ $order->tax_cost ? 'Rp' . number_format($order->tax_cost, 0, ',', '.') : '-' }}
                                        </p>
                                    </div>
                                </div>
                                <hr class="w-full !my-5 border-t border-white/40">
                                <div class="flex justify-between">
                                    <h4>Total</h4>
                                    <p class="text-right text-white">
                                        {{ $order->total_cost ? 'Rp' . number_format($order->total_cost, 0, ',', '.') : '-' }}
                                    </p>
                                </div>
                            </div>

                            <div class="status">
                                <h4 class="!mb-8">Status Pesanan</h4>
                                <div class="flow relative">
                                    <div class="step first {{ $order->current_status_id > 1 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($order->current_status_id > 1)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Konfirmasi Pesanan</p>
                                            @if ($order->current_status_id > 1 && $order->current_status_id < 8)
                                                <p class="title">Pesanan dikonfirmasi pada 23 Desember 2025</p>
                                                @if ($order->current_status_id == 2)
                                                    <a class="btn-main mt-2"
                                                        href="/lengkapi-pesanan/{{ $order->unique_order }}">
                                                        <span>Lengkapi Pesanan</span>
                                                    </a>
                                                @endif
                                            @elseif ($order->current_status_id == 8)
                                                <p class="title">{{ $order_status->note }}</p>
                                                <p class="text-sm text-gray-400 mb-2">
                                                    Jika membutuhkan informasi lebih
                                                    lanjut, silakan hubungi sales Anda.
                                                </p>

                                                <a href="https://wa.me/{{ auth()->user()->sales->phone }}" target="_blank"
                                                    class="btn-invoice">
                                                    <i class="fab fa-whatsapp me-2"></i>
                                                    Hubungi Sales
                                                </a>
                                            @else
                                                <div class="w-75">
                                                    <p class="title mb-2">Pesanan Anda sedang dalam proses konfirmasi oleh
                                                        tim
                                                        kami</p>

                                                    <p class="text-sm text-gray-400 mb-4">
                                                        Mohon periksa email secara berkala untuk mendapatkan notifikasi
                                                        selanjutnya.
                                                    </p>

                                                    <p class="text-sm text-gray-400 mb-2">
                                                        Jika mengalami kendala atau membutuhkan informasi lebih
                                                        lanjut, silakan hubungi sales Anda.
                                                    </p>

                                                    <a href="https://wa.me/{{ auth()->user()->sales->phone }}"
                                                        target="_blank" class="btn-invoice">
                                                        <i class="fab fa-whatsapp me-2"></i>
                                                        Hubungi Sales
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                        class="step {{ $order->current_status_id >= 4 && $order->current_status_id < 8 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($order->current_status_id >= 4 && $order->current_status_id < 8)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p
                                                class="{{ $order->current_status_id >= 4 && $order->current_status_id < 8 ? '' : 'pt-3' }}">
                                                Pembayaran</p>
                                            @if ($order->current_status_id >= 4 && $order->current_status_id < 8)
                                                <p class="title">Rp123.456.000</p>
                                                <a class="btn-invoice mt-2" href="#">
                                                    <span><i class="fa-solid fa-download me-2"></i>Unduh Invoice</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="step">
                                        <div class="indicator">
                                            <div class="dot"></div>
                                        </div>
                                        <div class="content">
                                            <p class="pt-3">Pengiriman</p>
                                        </div>
                                    </div>

                                    <div class="step">
                                        <div class="indicator">
                                            <div class="dot"></div>
                                        </div>
                                        <div class="content">
                                            <p class="pt-3">Pesanan Diterima</p>
                                        </div>
                                    </div>

                                    <div class="step last">
                                        <div class="indicator">
                                            <div class="dot"></div>
                                        </div>
                                        <div class="content">
                                            <p class="pt-3">Aktivasi Perangkat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col md:w-1/2 flex flex-col gap-9">
                            <div class="contact">
                                <h4 class="!mb-8">Narahubung</h4>
                                <div class="form-border">
                                    <div class="field-set">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $order->order_contact?->name ?? '-' }}" disabled />
                                    </div>
                                    <div class="field-set">
                                        <label>Nomor Telepon</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ $order->order_contact?->phone ?? '-' }}" disabled />
                                    </div>
                                    <div class="field-set">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            value="{{ $order->order_contact?->email ?? '-' }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="delivery">
                                <h4 class="!mb-8">Alamat Pengiriman</h4>
                                <div class="form-border">
                                    <div class="flex gap-3">
                                        <div class="field-set w-1/2">
                                            <label>Provinsi</label>
                                            <input type="text" name="province" id="province" class="form-control"
                                                value="{{ $order->order_address?->province ?? '-' }}" disabled />
                                        </div>
                                        <div class="field-set w-1/2">
                                            <label>Kota</label>
                                            <input type="text" name="city" id="city" class="form-control"
                                                value="{{ $order->order_address?->city ?? '-' }}" disabled />
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="field-set w-1/2">
                                            <label>Kecamatan</label>
                                            <input type="text" name="district" id="district" class="form-control"
                                                value="{{ $order->order_address?->district ?? '-' }}" disabled />
                                        </div>
                                        <div class="field-set w-1/2">
                                            <label>Kelurahan</label>
                                            <input type="text" name="village" id="village" class="form-control"
                                                value="{{ $order->order_address?->village ?? '-' }}" disabled />
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="field-set w-1/3">
                                            <label>RT</label>
                                            <input type="text" name="rt" id="rt" class="form-control"
                                                value="{{ $order->order_address?->rt ?? '-' }}" disabled />
                                        </div>
                                        <div class="field-set w-1/3">
                                            <label>RW</label>
                                            <input type="text" name="rw" id="rw" class="form-control"
                                                value="{{ $order->order_address?->rw ?? '-' }}" disabled />
                                        </div>
                                        <div class="field-set w-1/3">
                                            <label>Kode Pos</label>
                                            <input type="text" name="post-code" id="post-code" class="form-control"
                                                value="{{ $order->order_address?->postal_code ?? '-' }}" disabled />
                                        </div>
                                    </div>
                                    <div class="field-set">
                                        <label>Alamat Lengkap</label>
                                        <textarea name="address" id="address" class="form-control !min-h-[160px]">{{ $order->order_address?->full_address ?? '-' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="install">
                                <h4 class="!mb-8">Lokasi Instalasi & Aktivasi</h4>
                                <div id="map" class="w-full !h-[250px] rounded-lg mb-3"></div>
                                <a href="{{ $order->activation_address?->google_maps_url ?? '-' }}"
                                    class="text-white border-2 border-white/10 px-2 py-2.5 block">
                                    {{ $order->activation_address?->google_maps_url ?? '-' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // === Script Upload File Start ===
        function triggerFile() {
            document.getElementById('uploadInput').click();
        }

        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('placeholder').style.display = 'none';
                document.getElementById('previewWrapper').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }

        function removeImage(event) {
            event.stopPropagation();
            document.getElementById('uploadInput').value = '';
            document.getElementById('previewWrapper').style.display = 'none';
            document.getElementById('placeholder').style.display = 'block';
        }
        // === Script Upload File End ===

        // === Script Preview Map Start ===
        const lat = {{ $order->activation_address?->latitude ?? '-' }};
        const lng = {{ $order->activation_address?->longitude ?? '-' }};
        const map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([lat, lng])
            .addTo(map)
            .bindPopup('Lokasi Anda')
            .openPopup();
        // === Script Preview Map End ===
    </script>
@endsection
