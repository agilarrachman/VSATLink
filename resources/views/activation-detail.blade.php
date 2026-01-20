@extends('layouts.app')

@section('title', 'Aktivasi Saya | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="/images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="content-order z-1000 mt-14 mx-auto">
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
                                    <img src="/storage/{{ $nota->order->product->image_url }}"
                                        alt="{{ $nota->order->product->name }}" class="rounded-md object-cover w-[120px]" />
                                    <div class="info w-full mb-3 mb-md-0">
                                        @php($badge = $nota->statusBadge())
                                        <div class="status px-3 py-1 rounded-full w-fit mb-2 {{ $badge['class'] }}">
                                            <p class="text-sm mb-0">{{ $badge['label'] }}</p>
                                        </div>
                                        <p class="mb-0 text-base text-white">
                                            Kode Pesanan: {{ $nota->order->unique_order }}
                                        </p>
                                        <h4 class="mb-0">{{ $nota->order->product->name }}</h4>
                                        <p class="mb-0 text-sm text-white">
                                            @if ($nota->current_status_id >= 4)
                                                Jadwal Instalasi pada tanggal
                                                {{ $nota->installation_date->translatedFormat('d F Y') }} |
                                                {{ $nota->installation_session === 'Pagi' ? 'Pagi (08.00 - 11.00)' : 'Siang (13.00 - 17.00)' }}
                                            @else
                                                Belum dijadwalkan
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="status">
                                <h4 class="!mb-8">Status Aktivasi</h4>
                                <div class="flow relative">
                                    <div
                                        class="activate-step first {{ $nota->current_status_id >= 4 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id >= 4)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Penjadwalan</p>
                                            @if ($nota->current_status_id == 1 || $nota->current_status_id == 3)
                                                <p class="title">
                                                    Jadwal instalasi dan aktivasi layanan Anda sedang dalam proses penentuan
                                                </p>
                                                <p class="text-sm text-gray-400 mb-2">
                                                    Mohon periksa email secara berkala untuk mendapatkan notifikasi
                                                    selanjutnya. Jika membutuhkan informasi lebih lanjut, silakan hubungi
                                                    sales Anda.
                                                </p>
                                                <a href="https://wa.me/{{ auth()->user()->sales->phone }}" target="_blank"
                                                    class="btn-invoice">
                                                    <i class="fab fa-whatsapp me-2"></i>
                                                    Hubungi Sales
                                                </a>
                                            @elseif ($nota->current_status_id == 2)
                                                <p class="title">
                                                    Dijadwalkan pada tanggal
                                                    {{ $nota->installation_date->translatedFormat('d F Y') }} |
                                                    {{ $nota->installation_session === 'Pagi' ? 'Pagi (08.00 - 11.00)' : 'Siang (13.00 - 17.00)' }}
                                                </p>
                                                <p class="text-base text-gray-400 mb-2">
                                                    Mohon konfirmasi kesediaan Anda terhadap jadwal instalasi tersebut.
                                                </p>
                                                <div class="flex gap-3 mt-3">
                                                    <button type="button" class="btn-main">
                                                        Konfirmasi
                                                    </button>
                                                    <button type="button" class="btn-disabled" id="rejectBtn">
                                                        Tolak
                                                    </button>
                                                </div>
                                                <div id="reject-form" class="mt-4 hidden">
                                                    <label class="block text-sm text-white mb-2">
                                                        Alasan Penolakan Jadwal
                                                    </label>
                                                    <textarea name="reject_reason" rows="4" class="form-control w-full"
                                                        placeholder="Silakan jelaskan alasan penolakan jadwal instalasi. Contoh: Tidak tersedia pada tanggal tersebut. Saya merekomendasikan jadwal alternatif pada tanggal 25 Januari 2026 sesi Siang (13.00 - 17.00)."></textarea>
                                                    <div class="flex gap-3 mt-3">
                                                        <button type="submit" class="btn-main">
                                                            Kirim Penolakan
                                                        </button>
                                                        <button type="button" id="btn-cancel-reject" class="btn-outline">
                                                            Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="activate-step {{ $nota->current_status_id >= 4 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id >= 4)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Perjalanan Teknisi</p>
                                        </div>
                                    </div>

                                    <div class="activate-step {{ $nota->current_status_id >= 6 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id >= 6)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Proses Instalasi & Aktivasi</p>
                                        </div>
                                    </div>

                                    <div
                                        class="activate-step last {{ $nota->current_status_id == 9 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id == 9)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Dokumen Legalitas</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col md:w-1/2 flex flex-col gap-9">
                            <div class="device">
                                <h4 class="!mb-8">Serial Number Perangkat</h4>
                                <div class="form-border row">
                                    <div class="field-set col-md-6">
                                        <label>Moderm Serial Number</label>
                                        <input type="text" name="modem_sn" id="modem_sn" class="form-control"
                                            value="{{ $nota->order->modem_sn ?? '-' }}" disabled />
                                    </div>
                                    <div class="field-set col-md-6">
                                        <label>Adaptor Serial Number</label>
                                        <input type="text" name="adaptor_sn" id="adaptor_sn" class="form-control"
                                            value="{{ $nota->order->adaptor_sn ?? '-' }}" disabled />
                                    </div>
                                    <div class="field-set col-md-6">
                                        <label>BUC Serial Number</label>
                                        <input type="text" name="buc_sn" id="buc_sn" class="form-control"
                                            value="{{ $nota->order->buc_sn ?? '-' }}" disabled />
                                    </div>
                                    <div class="field-set col-md-6">
                                        <label>LNB Serial Number</label>
                                        <input type="text" name="lnb_sn" id="lnb_sn" class="form-control"
                                            value="{{ $nota->order->lnb_sn ?? '-' }}" disabled />
                                    </div>
                                    @if ($nota->order->product->access_point != null)
                                        <div class="field-set col-md-6">
                                            <label>Router Serial Number</label>
                                            <input type="text" name="router_sn" id="router_sn" class="form-control"
                                                value="{{ $nota->order->router_sn ?? '-' }}" disabled />
                                        </div>
                                    @endif
                                    <div class="field-set col-md-6">
                                        <label>Antena Serial Number</label>
                                        <input type="text" name="antena_sn" id="antena_sn" class="form-control"
                                            value="{{ $nota->order->antena_sn ?? '-' }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="install">
                                <h4 class="!mb-8">Lokasi Instalasi & Aktivasi</h4>
                                <div id="map" class="w-full !h-[250px] rounded-lg mb-3"></div>
                                <a href="{{ $nota->order->activation_address?->google_maps_url ?? '-' }}"
                                    class="text-white border-2 border-white/10 px-2 py-2.5 block">
                                    {{ $nota->order->activation_address?->google_maps_url ?? '-' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div id="rejectModal" class="fixed inset-0 bg-black/25 hidden items-center justify-center z-[9999]">
            <div
                class="bg-gray-900/40 backdrop-blur-md border !border-white/20 rounded-sm w-full max-w-[750px] p-6 relative mx-3">
                <h4 class="mb-4 text-center">Berikan Alasan Penolakan Jadwal</h4>

                <form action="/reject-schedule" method="POST">
                    @csrf
                    <div class="form-border">
                        <textarea name="reject_reason" id="reject_reason" class="form-control !min-h-[160px] mb-3"
                            placeholder="Silakan jelaskan alasan penolakan jadwal instalasi.Contoh: Tidak tersedia pada tanggal tersebut. Saya merekomendasikan jadwal alternatif pada tanggal 25 Januari 2026 sesi Siang (13.00 - 17.00)."></textarea>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <button id="cancelBtn" type="button"
                            class="font-bold !text-sm text-white !uppercase !rounded-[5px] !font-['Oxanium',Helvetica,Arial,sans-serif] w-full md:w-1/2 px-4 py-2 !bg-[#9692A0] hover:!bg-[#898592]">
                            Batalkan
                        </button>
                        <button id="submitRejectBtn" type="submit" class="btn-main w-full md:w-1/2">
                            Buat Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // === Script Preview Map Start ===
        const lat = {{ $nota->order->activation_address?->latitude ?? 'null' }};
        const lng = {{ $nota->order->activation_address?->longitude ?? 'null' }};
        const map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([lat, lng])
            .addTo(map)
            .bindPopup('Lokasi Anda')
            .openPopup();
        // === Script Preview Map End ===

        // === Script Reject Jadwal Instalasi Start ===
        const modal = document.getElementById('rejectModal');
        const rejectBtn = document.getElementById('rejectBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const submitBtn = document.getElementById('submitRejectBtn');

        rejectBtn.addEventListener('click', openModal);

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(initMap, 100);
        }

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        submitBtn.addEventListener('click', () => {
            if (!latInput.value || !lngInput.value) {
                alert('Silakan pilih lokasi di map');
                return;
            }

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
        // === Script Reject Jadwal Instalasi End ===
    </script>
@endsection
