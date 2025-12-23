@extends('layouts.app')

@section('title', 'Pesanan Saya | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />
            <div
                class="container shadow-lg/10 rounded-10 bg-gray-900/40 backdrop-blur-md border !border-white/20 !p-10 z-1000 mt-14 mb-auto">
                <div class="flex flex-col md:flex-row gap-9">
                    <div class="col md:w-1/2 flex flex-col gap-9">
                        <div class="detail">
                            <h4 class="!mb-8">Rincian Pesanan</h4>
                            <div class="flex items-start gap-4">
                                <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                    class="rounded-md object-cover w-[120px]" />
                                <div class="info w-full mb-3 mb-md-0">
                                    <div
                                        class="status bg-[var(--primary-color)] px-3 py-1 rounded-full text-white w-fit mb-1">
                                        <p class="text-sm mb-0">
                                            Sedang Diproses
                                        </p>
                                    </div>
                                    <p class="mb-0 text-base text-white">
                                        Kode Pesanan: VSL7393741
                                    </p>
                                    <h4 class="mb-0">Nama Layanan</h4>
                                    <p class="mb-0 text-base">
                                        Pesanan dibuat pada tanggal 19 November
                                        2025
                                    </p>
                                </div>
                            </div>
                            <div class="summary my-3">
                                <div class="flex justify-between">
                                    <h4>Jenis Pengiriman</h4>
                                    <p class="text-right text-white">JNE</p>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Harga</h4>
                                    <p class="text-right text-white">Rp11.500.000</p>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Biaya Pengiriman</h4>
                                    <p class="text-right text-white">Rp11.500.000</p>
                                </div>
                                <div class="flex justify-between">
                                    <h4>Biaya Instalasi</h4>
                                    <p class="text-right text-white">Rp11.500.000</p>
                                </div>
                                <div class="flex justify-between">
                                    <h4>PPN (10%)</h4>
                                    <p class="text-right text-white">Rp1.150.000</p>
                                </div>
                            </div>
                            <hr class="w-full !my-5 border-t border-white/40">
                            <div class="flex justify-between">
                                <h4>Total</h4>
                                <p class="text-right text-white">Rp50.150.000</p>
                            </div>
                        </div>

                        <div class="status">
                            <h4 class="!mb-8">Status Pesanan</h4>
                            <div class="flow relative">
                                <div class="step completed">
                                    <div class="indicator">
                                        <div class="dot">
                                            <div class="circle">
                                                <i class="fa-solid fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>Konfirmasi Pesanan</p>
                                        <p class="title">Pesanan dikonfirmasi pada 23 Desember 2025</p>
                                    </div>
                                </div>

                                <div class="step completed">
                                    <div class="indicator">
                                        <div class="dot">
                                            <div class="circle">
                                                <i class="fa-solid fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>Pembayaran</p>
                                        <p class="title">Rp123.456.000</p>
                                        <a class="btn-invoice mt-2" href="#">
                                            <span><i class="fa-solid fa-download me-2"></i>Unduh Invoice</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="indicator">
                                        <div class="dot"></div>
                                    </div>
                                    <div class="content">
                                        <p>Pengiriman</p>
                                    </div>
                                </div>

                                <div class="step">
                                    <div class="indicator">
                                        <div class="dot"></div>
                                    </div>
                                    <div class="content">
                                        <p>Pesanan Diterima</p>
                                    </div>
                                </div>

                                <div class="step last">
                                    <div class="indicator">
                                        <div class="dot"></div>
                                    </div>
                                    <div class="content">
                                        <p>Aktivasi Perangkat</p>
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
                                        value="Agil ArRachman" disabled />
                                </div>
                                <div class="field-set">
                                    <label>Nomor Telepon</label>
                                    <input type="number" name="phone" id="phone" class="form-control"
                                        value="081332303211" disabled />
                                </div>
                                <div class="field-set">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="agilarrachman@gmail.com" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="delivery">
                            <h4 class="!mb-8">Alamat Pengiriman</h4>
                            <div class="form-border">
                                <div class="flex gap-3">
                                    <div class="field-set w-1/2">
                                        <label>Provinsi</label>
                                        <select class="form-select" disabled>
                                            <option selected>Pilih Provinsi</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="field-set w-1/2">
                                        <label>Kota</label>
                                        <select class="form-select" disabled>
                                            <option selected>Pilih Kota</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="field-set w-1/2">
                                        <label>Kecamatan</label>
                                        <select class="form-select" disabled>
                                            <option selected>Pilih Kecamatan</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="field-set w-1/2">
                                        <label>Kelurahan</label>
                                        <select class="form-select" disabled>
                                            <option selected>Pilih Kelurahan</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="field-set w-1/3">
                                        <label>RT</label>
                                        <input type="number" name="rt" id="rt" class="form-control"
                                            value="1" disabled />
                                    </div>
                                    <div class="field-set w-1/3">
                                        <label>RW</label>
                                        <input type="number" name="rw" id="rw" class="form-control"
                                            value="3" disabled />
                                    </div>
                                    <div class="field-set w-1/3">
                                        <label>Kode Pos</label>
                                        <input type="number" name="post-code" id="post-code" class="form-control"
                                            value="12345" disabled />
                                    </div>
                                </div>
                                <div class="field-set">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="address" id="address" class="form-control !min-h-[160px]">Jalan Sudirman No 19</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="install">
                            <h4 class="!mb-8">Lokasi Instalasi & Aktivasi</h4>
                            <div id="map" class="w-full !h-[250px] rounded-lg mb-3"></div>
                            <a href="https://maps.app.goo.gl/189CmxbFUrZpXsD19"
                                class="text-white border-2 border-white/10 px-2 py-2.5 block">
                                https://maps.app.goo.gl/189CmxbFUrZpXsD19
                            </a>
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
        // Koordinat dummy
        const lat = -6.602234321160505;
        const lng = 106.80913996183654;

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
