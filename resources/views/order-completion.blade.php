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
                                <div class="flex items-center gap-3">
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
                                <h4>Narahubung</h4>
                                <p class="!mb-4">Data ini digunakan untuk konfirmasi dan komunikasi pemesanan</p>
                                <div class="form-border">
                                    <div class="field-set">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Masukkan Nama Narahubung" />
                                    </div>
                                    <div class="field-set">
                                        <label>Nomor Telepon</label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Narahubung" />
                                    </div>
                                    <div class="field-set">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Masukkan Email Narhubung" />
                                    </div>
                                </div>
                            </div>
                            <div class="address md:w-1/2">
                                <h4>Alamat Pengiriman</h4>
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
                                                    <option value="{{ $province->id }}"
                                                        {{ old('province') == $province->id ? 'selected' : '' }}>
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
                                        </div>
                                        <div class="field-set w-1/3">
                                            <label>RW</label>
                                            <input type="number" name="rw" id="rw" class="form-control"
                                                placeholder="RW" />
                                        </div>
                                        <div class="field-set w-1/3">
                                            <label>Kode Pos</label>
                                            <input type="number" name="postal-code" id="postal-code" class="form-control"
                                                placeholder="Kode Pos" readonly />
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
                            <button class="btn-main btn-fullwidth rounded-3" type="submit">Kirim Pesanan</button>
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
            function resetShippingAndAddress() {
                $('#shipping_cost').text('0');
                $('#shipping-etd').text('Pilih alamat untuk melihat estimasi sampai');
                updatePPNAndTotal();

                $('#province').prop('disabled', false);
                $('#province option:first').prop('selected', true);
                $('#city').html('<option selected>Pilih Kota</option>').prop('disabled', true);
                $('#district').html('<option selected>Pilih Kecamatan</option>').prop('disabled', true);
                $('#village').html('<option selected>Pilih Kelurahan</option>').prop('disabled', true);

                $('#postal-code').val('');
                $('#rt').val('');
                $('#rw').val('');
                $('#address').val('');
            }

            $('input[name="shipping"]').on('change', function() {
                const selected = $(this).attr('id');

                if (selected === 'pickup') {
                    resetShippingAndAddress();
                    $('#city, #district, #village, #postal-code, #rt, #rw, #address').prop('disabled',
                        true);
                }

                if (selected === 'jne') {
                    $('#province, #city, #district, #village, #postal-code, #rt, #rw, #address').prop(
                        'disabled', false);
                    resetShippingAndAddress();
                }
            });
            // Script Ambil di Tempat End            

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
            });

            disagreeBtn.addEventListener('click', function() {
                checkbox.checked = false;
                closeModal();
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
