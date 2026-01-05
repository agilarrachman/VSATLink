@extends('layouts.app')

@section('title', 'Lengkapi Pesanan | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="/images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="content z-1000 mt-14 mx-auto">
                @if (session()->has('error'))
                    <div class="alert text-white bg-gray-900/40 backdrop-blur-md border !border-white/20 alert-dismissible fade show mb-5 text-left"
                        role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert text-white bg-gray-900/40 backdrop-blur-md border !border-white/20 alert-dismissible fade show mb-5 text-left"
                        role="alert">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div
                    class="container shadow-lg/10 rounded-10 bg-gray-900/40 backdrop-blur-md border !border-white/20 !p-10">
                    <h3 class="text-3xl text-center !mb-7">Lengkapi Pemesanan</h3>
                    <form class="flex flex-col gap-7" action="/lengkapi-pesanan/{{ $order->unique_order }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="shipping_cost" id="shipping_cost_input">
                        <input type="hidden" name="tax_cost" id="tax_cost_input">
                        <input type="hidden" name="total_cost" id="total_cost_input">

                        <div class="col flex flex-col md:flex-row gap-9">
                            <div class="detail md:w-1/2">
                                <h4 class="!mb-4">Rincian Pesanan</h4>
                                <div class="flex justify-between items-center gap-3">
                                    <div class="info flex items-center gap-4">
                                        <img src="/storage/{{ $order->product->image_url }}"
                                            alt="{{ $order->product->name }}" class="rounded-md object-cover w-[120px]" />
                                        <div class="info w-full mb-3 mb-md-0">
                                            <p class="mb-0 text-base text-white">
                                                Kode Pesanan: {{ $order->unique_order }}
                                            </p>
                                            <h4 class="mb-0">{{ $order->product->name }}</h4>
                                            <p class="mb-0 text-base">
                                                Pesanan dibuat pada tanggal
                                                {{ $order->created_at->translatedFormat('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <p class="text-right text-white">
                                            {{ $order->product_cost ? 'Rp' . number_format($order->product_cost, 0, ',', '.') : '-' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="summary my-3">
                                    <div class="flex justify-between">
                                        <h4>Biaya Pengiriman</h4>
                                        <p class="text-right text-white" id="shipping_cost">Rp0</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <h4>Biaya Instalasi</h4>
                                        <p class="text-right text-white">
                                            {{ $order->installation_service_cost == 0 && $order->installation_transport_cost == 0
                                                ? '-'
                                                : 'Rp' . number_format($order->installation_service_cost + $order->installation_transport_cost, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between">
                                        <h4>PPN (10%)</h4>
                                        <p class="text-right text-white" id="ppn_cost">Rp0</p>
                                    </div>
                                </div>
                                <hr class="w-full !my-5 border-t border-white/40">
                                <div class="flex justify-between">
                                    <h4>Total</h4>
                                    <p class="text-right text-white" id="total_cost">Rp0</p>
                                </div>
                            </div>

                            <div class="shipping md:w-1/2">
                                <h4>Jenis Pengiriman</h4>
                                <p class="!mb-4">Pilih metode pengiriman perangkat sesuai kebutuhan Anda</p>
                                <div class="form-check p-0 mb-3 !flex !items-center">
                                    <input class="form-check-input ms-2 me-0 shrink-0" type="radio" name="shipping"
                                        id="jne" value="JNE" checked>
                                    <label class="form-check-label ms-3 cursor-pointer" for="jne">
                                        <h4 class="mb-1">Ekspedisi JNE</h4>
                                        <p class="text-white mb-0" id="shipping-etd">Pilih alamat untuk melihat estimasi
                                            sampai
                                        </p>
                                    </label>
                                </div>

                                <div class="form-check p-0 !flex !items-center">
                                    <input class="form-check-input ms-2 me-0 shrink-0" type="radio" name="shipping"
                                        id="pickup" value="Ambil Ditempat">
                                    <label class="form-check-label ms-3 cursor-pointer" for="pickup">
                                        <h4 class="mb-1">Ambil di VSATLink Center</h4>
                                        <p class="text-white mb-0">
                                            Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal,
                                            Kota Bogor, Jawa Barat 16166
                                        </p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col flex flex-col md:flex-row gap-9">
                            <div class="contact md:w-1/2">
                                <div class="flex justify-between">
                                    <h4>Narahubung</h4>
                                    <div class="my-contact">
                                        <input class="form-check-input me-1" type="checkbox" value="" id="my-contact">
                                        <label class="form-check-label text-white cursor-pointer" for="my-contact">
                                            Gunakan Kontak Saya
                                        </label>
                                    </div>
                                </div>
                                <p class="!mb-4">Data ini digunakan untuk konfirmasi dan komunikasi pemesanan</p>
                                <div class="form-border">
                                    <div class="field-set">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Masukkan Nama Narahubung" />
                                        <small class="text-white d-none" id="name-error">
                                            Nama wajib diisi
                                        </small>
                                    </div>
                                    <div class="field-set">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            inputmode="numeric" pattern="[0-9]*"
                                            placeholder="Masukkan Nomor Telepon Narahubung" />
                                        <small class="text-white d-none" id="phone-error">
                                            Nomor harus diawali 08 dan 10-20 digit
                                        </small>
                                    </div>
                                    <div class="field-set">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Masukkan Email Narhubung" />
                                        <small class="text-white d-none" id="email-error">
                                            Format email tidak valid
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="address md:w-1/2">
                                <div class="flex justify-between">
                                    <h4>Alamat Pengiriman</h4>
                                    <div class="my-address">
                                        <input class="form-check-input me-1" type="checkbox" value=""
                                            id="my-address">
                                        <label class="form-check-label text-white cursor-pointer" for="my-address">
                                            Gunakan Alamat Saya
                                        </label>
                                    </div>
                                </div>
                                <p class="!mb-4">Alamat ini digunakan sebagai tujuan pengiriman perangkat oleh tim
                                    logistik
                                </p>
                                <div class="form-border">
                                    <div class="flex gap-3">
                                        <div class="field-set w-1/2">
                                            <label>Provinsi</label>
                                            <select id="province" name="province" class="form-select">
                                                <option selected disabled>Pilih Provinsi</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="field-set w-1/2">
                                            <label>Kota</label>
                                            <select id="city" name="city" class="form-select">
                                                <option selected>Pilih Kota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="field-set w-1/2">
                                            <label>Kecamatan</label>
                                            <select id="district" name="district" class="form-select">
                                                <option selected>Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="field-set w-1/2">
                                            <label>Kelurahan</label>
                                            <select id="village" name="village" class="form-select">
                                                <option selected>Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="field-set w-1/3">
                                            <label>RT</label>
                                            <input type="number" name="rt" id="rt" class="form-control"
                                                placeholder="RT" />
                                            <small class="text-white d-none" id="rt-error">
                                                Harus 3 digit (contoh: 003)
                                            </small>
                                        </div>
                                        <div class="field-set w-1/3">
                                            <label>RW</label>
                                            <input type="number" name="rw" id="rw" class="form-control"
                                                placeholder="RW" />
                                            <small class="text-white d-none" id="rw-error">
                                                Harus 3 digit (contoh: 005)
                                            </small>
                                        </div>
                                        <div class="field-set w-1/3">
                                            <label>Kode Pos</label>
                                            <input type="number" name="postal-code" id="postal-code"
                                                class="form-control" placeholder="Kode Pos" readonly />
                                        </div>
                                    </div>
                                    <div class="field-set">
                                        <label>Alamat Lengkap</label>
                                        <textarea name="address" id="address" class="form-control !min-h-[160px]"
                                            placeholder="Masukkan Alamat Lengkap (Contoh: Jl. Sudirman No. 10, Jakarta)"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="agreement">
                            <input class="form-check-input me-2" type="checkbox" value="" id="agreement">
                            <label class="form-check-label text-white cursor-pointer" for="agreement">
                                Saya telah membaca dan menyetujui <span class="font-bold text-[#5623D8]">Syarat dan
                                    Ketentuan</span> penggunaan layanan
                            </label>
                        </div>
                        <div id="submit">
                            <button class="btn-fullwidth rounded-3" id="submitBtn" type="submit">Kirim
                                Pesanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div id="agreementModal" class="fixed inset-0 bg-black/30 hidden items-center justify-center z-[9999]">
            <div
                class="bg-gray-900/40 backdrop-blur-md border !border-white/20 rounded-sm w-full max-w-[750px] max-h-[90vh] mx-3 p-6 relative flex flex-col">
                <h3 class="text-3xl text-center mb-6 shrink-0">
                    Syarat dan Ketentuan Penggunaan Layanan
                </h3>

                <div class="text-white/80 text-sm leading-relaxed space-y-6
                    overflow-y-auto pr-2">
                    <div class="text-white/80 text-sm leading-relaxed space-y-6">

                        <div>
                            <h4 class="font-semibold text-white mb-2">1. Ketentuan Umum</h4>
                            <p>
                                Syarat dan ketentuan ini mengatur penggunaan layanan VSAT yang disediakan
                                melalui sistem VSATLink. Dengan mengakses dan menggunakan sistem ini,
                                pengguna menyatakan telah membaca, memahami, dan menyetujui seluruh
                                ketentuan yang tercantum.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">2. Ruang Lingkup Layanan</h4>
                            <p>
                                Layanan yang disediakan meliputi proses pemesanan layanan VSAT, pembayaran,
                                pengiriman perangkat, instalasi, aktivasi, pemantauan status layanan,
                                serta pengelolaan dokumen terkait layanan.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">3. Kewajiban dan Tanggung Jawab Pengguna</h4>
                            <p>
                                Pengguna wajib memberikan data yang benar, lengkap, dan akurat, termasuk
                                data narahubung, alamat pengiriman, serta lokasi instalasi. Pengguna juga
                                bertanggung jawab untuk menyediakan akses lokasi dan mendukung proses
                                instalasi serta pemeliharaan layanan.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">4. Pembayaran</h4>
                            <p>
                                Pembayaran dilakukan sesuai dengan total biaya yang tercantum pada invoice
                                resmi yang dihasilkan oleh sistem. Pembayaran dinyatakan sah setelah
                                berhasil diverifikasi oleh sistem. Pembayaran yang telah dilakukan
                                tidak dapat dibatalkan secara sepihak.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">5. Pengiriman Perangkat</h4>
                            <p>
                                Pengiriman perangkat dilakukan sesuai metode yang dipilih pengguna, baik
                                melalui ekspedisi maupun pengambilan langsung. Risiko keterlambatan
                                pengiriman yang disebabkan oleh pihak ekspedisi berada di luar tanggung
                                jawab penyedia layanan.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">6. Instalasi dan Aktivasi</h4>
                            <p>
                                Instalasi dan aktivasi layanan dilakukan setelah perangkat diterima dan
                                jadwal instalasi disepakati. Aktivasi hanya dapat dilakukan apabila seluruh
                                data teknis dan administratif telah dinyatakan lengkap dan valid.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">7. Gangguan Layanan</h4>
                            <p>
                                Gangguan layanan dapat terjadi akibat faktor teknis, kondisi cuaca,
                                gangguan jaringan satelit, atau faktor eksternal lainnya. Penyedia layanan
                                akan melakukan upaya perbaikan sesuai prosedur operasional yang berlaku.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">8. Pemeliharaan dan Perawatan</h4>
                            <p>
                                Penyedia layanan berhak melakukan pemeliharaan sistem secara berkala.
                                Pemeliharaan yang berpotensi memengaruhi layanan akan diinformasikan
                                kepada pengguna apabila memungkinkan.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">9. Batasan Tanggung Jawab</h4>
                            <p>
                                Penyedia layanan tidak bertanggung jawab atas kerugian yang timbul akibat
                                kesalahan penggunaan layanan, kesalahan data dari pengguna, gangguan
                                eksternal, atau kondisi di luar kendali operasional penyedia layanan.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">10. Keadaan Kahar (Force Majeure)</h4>
                            <p>
                                Penyedia layanan tidak bertanggung jawab atas keterlambatan atau kegagalan
                                layanan yang disebabkan oleh keadaan kahar, termasuk namun tidak terbatas
                                pada bencana alam, gangguan jaringan global, atau kebijakan pemerintah.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">11. Perubahan Ketentuan</h4>
                            <p>
                                Penyedia layanan berhak melakukan perubahan terhadap syarat dan ketentuan
                                ini. Perubahan akan diberlakukan setelah diumumkan melalui sistem.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-white mb-2">12. Persetujuan</h4>
                            <p>
                                Dengan mencentang persetujuan dan melanjutkan proses pemesanan, pengguna
                                menyatakan setuju dan terikat pada seluruh syarat dan ketentuan penggunaan
                                layanan ini.
                            </p>
                        </div>

                    </div>

                    <div class="flex flex-col md:flex-row gap-3">
                        <button id="disagreeBtn"
                            class="font-bold !text-sm text-white !uppercase !rounded-[5px] !font-['Oxanium',Helvetica,Arial,sans-serif] w-full md:w-1/2 px-4 py-2 !bg-[#9692A0] hover:!bg-[#898592]">
                            Tidak Setuju
                        </button>

                        <button id="agreeBtn" class="btn-main w-full md:w-1/2">
                            Setuju
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Script Validadsi Form Start
            function showError(field, message) {
                $(`#${field}-error`).text(message).removeClass('d-none');
            }

            function hideError(field) {
                $(`#${field}-error`).addClass('d-none');
            }

            function isValidPhone(phone) {
                return /^08\d{8,18}$/.test(phone);
            }

            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            function isValidRTRW(value) {
                return /^\d{3}$/.test(value);
            }

            function isFormValid() {
                let valid = true;

                const name = $('#name').val().trim();
                const phone = $('#phone').val().trim();
                const email = $('#email').val().trim();
                const rt = $('#rt').val().trim();
                const rw = $('#rw').val().trim();
                const address = $('#address').val().trim();

                if (!name) {
                    valid = false;
                }

                if (!phone) {
                    valid = false;
                } else if (!isValidPhone(phone)) {
                    showError('phone', 'Nomor harus diawali 08 dan 10-20 digit');
                    valid = false;
                } else {
                    hideError('phone');
                }

                if (!email) {
                    valid = false;
                } else if (!isValidEmail(email)) {
                    showError('email', 'Format email tidak valid');
                    valid = false;
                } else {
                    hideError('email');
                }

                if (!rt) {
                    valid = false;
                } else if (!isValidRTRW(rt)) {
                    showError('rt', 'Harus 3 digit (contoh: 003)');
                    valid = false;
                } else {
                    hideError('rt');
                }

                if (!rw) {
                    valid = false;
                } else if (!isValidRTRW(rw)) {
                    showError('rw', 'Harus 3 digit (contoh: 010)');
                    valid = false;
                } else {
                    hideError('rw');
                }

                if (!address) {
                    valid = false;
                }

                if ($('#jne').is(':checked')) {
                    const selects = ['province', 'city', 'district', 'village'];
                    selects.forEach(id => {
                        if (!$(`#${id}`).val() || $(`#${id}`).prop('selectedIndex') === 0) {
                            valid = false;
                        }
                    });
                }

                if (!$('#agreement').is(':checked')) {
                    valid = false;
                }

                return valid;
            }

            function toggleSubmitButton() {
                const btn = $('#submitBtn');

                if (isFormValid()) {
                    btn.prop('disabled', false)
                        .removeClass('btn-disabled cursor-not-allowed')
                        .addClass('btn-main');
                } else {
                    btn.prop('disabled', true)
                        .removeClass('btn-main')
                        .addClass('btn-disabled cursor-not-allowed');
                }
            }

            $('input, textarea, select').on('input change', function() {
                toggleSubmitButton();
            });

            toggleSubmitButton();
            // Script Validadsi Form End

            // Script Perhitungan PPn dan Total Start
            function formatRupiah(number) {
                return 'Rp' + new Intl.NumberFormat('id-ID').format(number);
            }

            function updatePPNAndTotal() {
                let productCost = {{ $order->product_cost ?? 0 }};
                let shippingCost = parseInt($('#shipping_cost').text().replace(/\D/g, '')) || 0;
                let installationCost =
                    {{ $order->installation_service_cost + $order->installation_transport_cost ?? 0 }};

                let subtotal = productCost + shippingCost + installationCost;
                let ppn = Math.round(subtotal * 0.10);
                let total = subtotal + ppn;

                $('#shipping_cost').text(formatRupiah(shippingCost));
                $('#ppn_cost').text(formatRupiah(ppn));
                $('#total_cost').text(formatRupiah(total));

                $('#shipping_cost_input').val(shippingCost);
                $('#tax_cost_input').val(ppn);
                $('#total_cost_input').val(total);
            }

            updatePPNAndTotal();
            // Script Perhitungan PPn dan Total End

            // Script Filter Provinsi, Kota, Kecamatan, Kelurahan Start
            $('#province').on('change', function() {
                let provinceId = $(this).val();

                $('#city').prop('disabled', true).html('<option selected>Pilih Kota</option>');
                $('#district').prop('disabled', true).html('<option selected>Pilih Kecamatan</option>');
                $('#village').prop('disabled', true).html('<option selected>Pilih Kelurahan</option>');
                $('#postal-code').val('Kode Pos');

                $.ajax({
                    url: `/cities/${provinceId}`,
                    type: 'GET',
                    success: function(data) {
                        $('#city').prop('disabled', false);

                        $.each(data, function(i, item) {
                            $('#city').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                });
            });

            $('#city').on('change', function() {
                let cityId = $(this).val();

                $('#district').prop('disabled', true).html('<option selected>Pilih Kecamatan</option>');
                $('#village').prop('disabled', true).html('<option selected>Pilih Kelurahan</option>');
                $('#postal-code').val('Kode Pos');

                $.ajax({
                    url: `/districts/${cityId}`,
                    type: 'GET',
                    success: function(data) {
                        $('#district').prop('disabled', false);

                        $.each(data, function(i, item) {
                            $('#district').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                });
            });

            $('#district').on('change', function() {
                let districtId = $(this).val();

                $('#village').prop('disabled', true).html('<option selected>Pilih Kelurahan</option>');
                $('#postal-code').val('Kode Pos');

                $.ajax({
                    url: `/villages/${districtId}`,
                    type: 'GET',
                    success: function(data) {
                        $('#village').prop('disabled', false);

                        $.each(data, function(i, item) {
                            $('#village').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                });
            });

            function formatTanggalID(date) {
                const bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                return `${date.getDate()} ${bulan[date.getMonth()]} ${date.getFullYear()}`;
            }

            function getJNEService(prices, cityId) {
                let service = prices.find(p => p.service_display === 'REG');

                // Kabupaten Bogor menggunakan CTC
                if (cityId == 70) {
                    service = prices.find(p => p.service_display === 'CTC') || service;
                }

                return service;
            }

            function renderShipping(priceData) {
                const etdFrom = parseInt(priceData.etd_from || 0);
                const etdThru = parseInt(priceData.etd_thru || 0);

                const fromDate = addDays(new Date(), etdFrom);
                const thruDate = addDays(new Date(), etdThru);

                const price = new Intl.NumberFormat('id-ID').format(priceData.price);

                const etdText = etdFrom === etdThru ?
                    `Estimasi tiba ${formatTanggalID(fromDate)}` :
                    `Estimasi tiba ${formatTanggalID(fromDate)} – ${formatTanggalID(thruDate)}`;

                $('#shipping_cost').text(price);
                $('#shipping-etd').text(`${priceData.service_display} • ${etdText}`);

                updatePPNAndTotal();
            }

            function setShippingUnavailable(message = 'Tidak tersedia') {
                $('#shipping_cost').text('0');
                $('#shipping-etd').text('-');

                updatePPNAndTotal();
            }

            function addDays(date, days) {
                const d = new Date(date);
                d.setDate(d.getDate() + days);
                return d;
            }

            $('#village').on('change', function() {
                const villageId = $(this).val();
                const cityId = $('#city').val();
                const deviceWeight = {{ $order->product->device_weight }};

                if (!villageId) return;

                $.get(`/postalcode/${villageId}`, function(data) {
                    $('#postal-code').val(data.postal_code ?? '');
                });

                $.ajax({
                    url: '/jne/tarif',
                    method: 'GET',
                    data: {
                        village_id: villageId,
                        device_weight: deviceWeight
                    },
                    beforeSend() {
                        $('#shipping_cost').text('Menghitung...');
                        $('#shipping-etd').text('Menghitung estimasi...');
                    },
                    success(res) {
                        if (!res.success || !res.data?.price?.length) {
                            return setShippingUnavailable();
                        }

                        const priceData = getJNEService(res.data.price, cityId);
                        if (!priceData) return setShippingUnavailable();

                        renderShipping(priceData);
                    },
                    error() {
                        setShippingUnavailable('Gagal mengambil ongkir');
                    }
                });
            });
            // Script Filter Provinsi, Kota, Kecamatan, Kelurahan End

            // Script Ambil di Tempat Start
            function resetAddressValue() {
                $('#province option:first').prop('selected', true);
                $('#city').html('<option selected>Pilih Kota</option>');
                $('#district').html('<option selected>Pilih Kecamatan</option>');
                $('#village').html('<option selected>Pilih Kelurahan</option>');

                $('#postal-code').val('');
                $('#rt').val('');
                $('#rw').val('');
                $('#address').val('');
            }

            function disableAddress() {
                $('#province, #city, #district, #village, #postal-code, #rt, #rw, #address')
                    .prop('disabled', true);
            }

            function enableAddress() {
                $('#province').prop('disabled', false);
                $('#city, #district, #village').prop('disabled', true);
                $('#postal-code, #rt, #rw, #address').prop('disabled', false);
            }

            $('input[name="shipping"]').on('change', function() {
                const selected = this.id;

                if (selected === 'pickup') {
                    $('#shipping_cost').text('0');
                    $('#shipping-etd').text('Pilih alamat untuk melihat estimasi sampai');
                    updatePPNAndTotal();

                    resetAddressValue();
                    disableAddress();
                }

                if (selected === 'jne') {
                    resetAddressValue();
                    enableAddress();

                    $('#shipping_cost').text('Rp0');
                    $('#shipping-etd').text('Pilih alamat untuk melihat estimasi sampai');
                    updatePPNAndTotal();
                }
            });
            // Script Ambil di Tempat End

            // Script Gunakan Kontak Saya Start
            const userContactName = @json(auth()->user()->contact_name);
            const userContactEmail = @json(auth()->user()->contact_email);
            const userContactPhone = @json(auth()->user()->contact_phone);
            const myContactCheckbox = document.getElementById('my-contact');

            myContactCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    if (!userContactName || !userContactEmail || !userContactPhone) {
                        alert('Kontak Anda belum lengkap. Silakan lengkapi profil terlebih dahulu.');
                        this.checked = false;
                        return;
                    }

                    $('#name').val(userContactName);
                    $('#email').val(userContactEmail);
                    $('#phone').val(userContactPhone);

                    toggleSubmitButton();
                } else {
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');

                    toggleSubmitButton();
                }
            });
            // Script Gunakan Kontak Saya End

            // Script Gunakan Alamat Saya Start
            const userAddressProvince = @json(auth()->user()->province()?->id);
            const userAddressCity = @json(auth()->user()->city()?->id);
            const userAddressDistrict = @json(auth()->user()->district()?->id);
            const userAddressVillage = @json(auth()->user()->village()?->id);

            const userAddressRT = @json(auth()->user()->rt);
            const userAddressRW = @json(auth()->user()->rw);
            const userAddressPostalCode = @json(auth()->user()->village()?->postal_code);
            const userAddressFullAddress = @json(auth()->user()->full_address);

            const myAddressCheckbox = document.getElementById('my-address');


            myAddressCheckbox.addEventListener('change', function() {
                if (this.checked) {

                    if (!userAddressProvince || !userAddressCity || !userAddressDistrict || !
                        userAddressVillage) {
                        alert('Alamat Anda belum lengkap. Silakan lengkapi profil terlebih dahulu.');
                        this.checked = false;
                        return;
                    }

                    $('#province').val(userAddressProvince).trigger('change');

                    $.get(`/cities/${userAddressProvince}`, function(cities) {
                        $('#city').prop('disabled', false).empty().append(
                            '<option>Pilih Kota</option>');
                        cities.forEach(city => {
                            $('#city').append(
                                `<option value="${city.id}">${city.name}</option>`);
                        });

                        $('#city').val(userAddressCity).trigger('change');

                        $.get(`/districts/${userAddressCity}`, function(districts) {
                            $('#district').prop('disabled', false).empty().append(
                                '<option>Pilih Kecamatan</option>');
                            districts.forEach(district => {
                                $('#district').append(
                                    `<option value="${district.id}">${district.name}</option>`
                                );
                            });

                            $('#district').val(userAddressDistrict).trigger('change');

                            $.get(`/villages/${userAddressDistrict}`, function(villages) {
                                $('#village').prop('disabled', false).empty()
                                    .append('<option>Pilih Kelurahan</option>');
                                villages.forEach(village => {
                                    $('#village').append(
                                        `<option value="${village.id}">${village.name}</option>`
                                    );
                                });

                                $('#village').val(userAddressVillage).trigger(
                                    'change');

                                $('#rt').val(userAddressRT);
                                $('#rw').val(userAddressRW);
                                $('#postal-code').val(userAddressPostalCode);
                                $('#address').val(userAddressFullAddress);

                                toggleSubmitButton();
                            });
                        });
                    });

                } else {
                    $('#province').prop('selectedIndex', 0).trigger('change');
                    $('#city').html('<option selected>Pilih Kota</option>').prop('disabled', true);
                    $('#district').html('<option selected>Pilih Kecamatan</option>').prop('disabled', true);
                    $('#village').html('<option selected>Pilih Kelurahan</option>').prop('disabled', true);
                    $('#rt, #rw, #postal-code, #address').val('');

                    $('#shipping_cost').text('Rp0');
                    $('#shipping-etd').text('Pilih alamat untuk melihat estimasi sampai');
                    updatePPNAndTotal();

                    toggleSubmitButton();
                }
            });
            // Script Gunakan Alamat Saya End

            // Script Syarat dan Ketentuan Start
            const checkbox = document.getElementById('agreement');
            const modal = document.getElementById('agreementModal');
            const agreeBtn = document.getElementById('agreeBtn');
            const disagreeBtn = document.getElementById('disagreeBtn');
            const body = document.body;

            checkbox.addEventListener('click', function(e) {
                e.preventDefault(); // cegah checkbox langsung tercentang
                openModal();
            });

            function openModal() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                body.classList.add('modal-open');

                if (typeof lenis !== 'undefined') {
                    lenis.stop();
                }
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                body.classList.remove('modal-open');

                if (typeof lenis !== 'undefined') {
                    lenis.start();
                }
            }

            agreeBtn.addEventListener('click', function() {
                checkbox.checked = true;
                closeModal();
                toggleSubmitButton();
            });

            disagreeBtn.addEventListener('click', function() {
                checkbox.checked = false;
                closeModal();
                toggleSubmitButton();
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    checkbox.checked = false;
                    closeModal();
                }
            });

            // Tangkap event scroll di dalam modal
            const modalContent = modal.querySelector('div > div:last-child');
            modalContent.addEventListener('wheel', function(e) {
                e.stopPropagation(); // Mencegah scroll event bubble ke parent
            }, {
                passive: false
            });
            // Script Syarat dan Ketentuan End
        });
    </script>
@endpush
