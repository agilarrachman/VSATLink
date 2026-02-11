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
                                                {{ $nota->installation_date->translatedFormat('d F Y') }}
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
                                                    {{ $nota->installation_date->translatedFormat('d F Y') }}
                                                </p>
                                                <p class="text-base text-gray-400 mb-2">
                                                    Mohon konfirmasi kesediaan Anda terhadap jadwal instalasi tersebut.
                                                </p>
                                                <div class="flex gap-3 mt-3">
                                                    <form action="/confirm-schedule/{{ $nota->id }}" method="POST"
                                                        class="bg-transparent"
                                                        onsubmit="return confirm('Apakah kamu yakin mengkonfirmasi jadwal instalasi dan aktivasi yang telah ditentukan?')">
                                                        @csrf
                                                        <button type="submit" class="btn-main">
                                                            Konfirmasi
                                                        </button>
                                                    </form>
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
                                            @else
                                                <p class="title">
                                                    Dijadwalkan pada tanggal
                                                    {{ $nota->installation_date->translatedFormat('d F Y') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="activate-step {{ $nota->current_status_id >= 7 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id >= 7)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Perjalanan Teknisi</p>
                                            @if ($nota->current_status_id >= 6)
                                                <p class="title">
                                                    {{ $activation_status->note }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="activate-step {{ $nota->current_status_id >= 9 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id >= 9)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>Proses Instalasi & Aktivasi</p>
                                            @if ($nota->current_status_id >= 7 && $nota->current_status_id < 9)
                                                <p class="title">
                                                    Proses instalasi dan aktivasi layanan sedang berlangsung
                                                </p>
                                            @elseif ($nota->current_status_id >= 9)
                                                <p class="title">
                                                    Layanan Anda telah berhasil diaktivasi pada
                                                    {{ $nota->online_date->translatedFormat('H:i | d F Y') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div
                                        class="activate-step last {{ $nota->current_status_id == 10 ? 'completed' : '-' }}">
                                        <div class="indicator">
                                            <div class="dot">
                                                @if ($nota->current_status_id == 10)
                                                    <div class="circle">
                                                        <i class="fa-solid fa-check"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="content" style="margin: auto 0;">
                                            <p>Dokumen Legalitas</p>
                                            @if ($nota->current_status_id == 9 && $nota->activation_document_url != null)
                                                <p class="title">
                                                    Tanda tangani Surat Pernyataan Aktivasi Anda
                                                </p>

                                                <form action="/signing/{{ $nota->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <p class="info">Silakan unggah tanda tangan Anda (latar belakang
                                                        putih/transparan)</p>

                                                    <div class="upload-box my-2" onclick="triggerFile()">
                                                        <input type="file" id="uploadInput" name="image"
                                                            accept="image/*" hidden />

                                                        <div class="upload-placeholder" id="placeholder">
                                                            <i class="fa-solid fa-camera"></i>
                                                        </div>

                                                        <div class="preview-wrapper" id="previewWrapper">
                                                            <img id="previewImage" />
                                                            <span class="remove-btn" onclick="removeImage(event)">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="flex gap-3">
                                                        <button type="submit" class="btn-disabled mt-2"
                                                            id="submitSignBtn" disabled>
                                                            Tandatangani
                                                        </button>

                                                        <a class="btn-spa mt-2"
                                                            href="{{ asset('storage/' . $nota->activation_document_url) }}"
                                                            download="{{ 'SPA-' . $nota->order->unique_order . '.pdf' }}">
                                                            <i class="fa-solid fa-download me-2"></i>
                                                            Unduh Preview
                                                        </a>
                                                    </div>

                                                    <p class="info mt-2">
                                                        *Dokumen otomatis ditandatangani jika 2x24 jam tidak ditandatangani
                                                        secara manual.
                                                    </p>
                                                </form>
                                            @elseif ($nota->current_status_id == 10)
                                                <p class="title">
                                                    Anda telah menandatangani Surat Pernyataan Aktivasi
                                                </p>
                                                <a class="btn-spa mt-2"
                                                    href="{{ asset('storage/' . $nota->activation_document_url) }}"
                                                    download="{{ 'SPA-' . $nota->order->unique_order . '.pdf' }}">
                                                    <i class="fa-solid fa-download me-2"></i>
                                                    Unduh SPA
                                                </a>
                                            @endif
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

                <form action="/reject-schedule/{{ $nota->id }}" method="POST">
                    @csrf
                    <div class="form-border">
                        <textarea name="reject_reason" id="reject_reason" class="form-control !min-h-[160px] mb-3"
                            placeholder="Silakan jelaskan alasan penolakan jadwal instalasi."></textarea>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <button id="cancelBtn" type="button"
                            class="font-bold !text-sm text-white !uppercase !rounded-[5px] !font-['Oxanium',Helvetica,Arial,sans-serif] w-full md:w-1/2 px-4 py-2 !bg-[#9692A0] hover:!bg-[#898592]">
                            Batalkan
                        </button>
                        <button id="submitRejectBtn" type="submit"
                            class="btn-main w-full md:w-1/2 opacity-50 cursor-not-allowed" disabled>
                            Kirim Penolakan
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
        const rejectBtn = document.getElementById('rejectBtn');
        const modal = document.getElementById('rejectModal');
        const rejectTextarea = document.getElementById('reject_reason');
        const cancelBtn = document.getElementById('cancelBtn');
        const submitBtn = document.getElementById('submitRejectBtn');

        if (rejectBtn) {
            rejectBtn.addEventListener('click', openModal);
        }

        function openModal() {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        cancelBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        submitBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

        rejectTextarea.addEventListener('input', function() {
            if (this.value.trim().length > 0) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        });
        // === Script Reject Jadwal Instalasi End ===

        // === Script Upload File Start ===
        const uploadInput = document.getElementById('uploadInput');
        const uploadBox = document.querySelector('.upload-box');
        const removeBtn = document.querySelector('.remove-btn');
        const submitSignBtn = document.getElementById('submitSignBtn');

        function enableSubmit() {
            submitSignBtn.disabled = false;
            submitSignBtn.classList.remove('btn-disabled');
            submitSignBtn.classList.add('btn-main');
        }

        function disableSubmit() {
            submitSignBtn.disabled = true;
            submitSignBtn.classList.add('btn-disabled');
            submitSignBtn.classList.remove('btn-main');
        }

        if (uploadInput) {
            uploadInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (!file) {
                    disableSubmit();
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const placeholder = document.getElementById('placeholder');
                    const previewWrapper = document.getElementById('previewWrapper');

                    if (placeholder) placeholder.style.display = 'none';
                    if (previewWrapper) previewWrapper.style.display = 'block';

                    document.getElementById('previewImage').src = e.target.result;
                    enableSubmit();
                };
                reader.readAsDataURL(file);
            });
        }

        if (uploadBox) {
            uploadBox.addEventListener('click', function() {
                if (uploadInput) uploadInput.click();
            });
        }

        if (removeBtn) {
            removeBtn.addEventListener('click', function(event) {
                event.stopPropagation();
                if (uploadInput) uploadInput.value = '';

                const previewWrapper = document.getElementById('previewWrapper');
                const placeholder = document.getElementById('placeholder');

                if (previewWrapper) previewWrapper.style.display = 'none';
                if (placeholder) placeholder.style.display = 'block';

                disableSubmit();
            });
        }
        // === Script Upload File End ===
    </script>
@endsection
