@extends('layouts.app')

@section('title', 'Lengkapi Pesanan | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />
            <div
                class="container shadow-lg/10 rounded-10 bg-gray-900/40 backdrop-blur-md border !border-white/20 !p-10 z-1000 mt-14 mb-auto">
                <h3 class="text-3xl text-center !mb-7">Lengkapi Pemesanan</h3>
                <form action="" class="flex flex-col gap-7">
                    <div class="col flex flex-col md:flex-row gap-9">
                        <div class="detail md:w-1/2">
                            <h4 class="!mb-4">Rincian Pesanan</h4>
                            <div class="flex items-center gap-5">
                                <div class="info flex items-center gap-4">
                                    <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                        class="rounded-md object-cover w-[120px]" />
                                    <div class="info w-full mb-3 mb-md-0">
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
                                <div class="price">
                                    <p class="text-right text-white">Rp11.500.000</p>
                                </div>
                            </div>
                            <div class="summary my-3">
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

                        <div class="delivery md:w-1/2">
                            <h4>Jenis Pengiriman</h4>
                            <p class="!mb-4">Pilih metode pengiriman perangkat sesuai kebutuhan Anda</p>
                            <div class="form-check p-0 mb-3 !flex !items-center">
                                <input class="form-check-input ms-2 me-0 shrink-0" type="radio" name="delivery"
                                    id="jne" checked>
                                <label class="form-check-label ms-3 cursor-pointer" for="jne">
                                    <h4 class="mb-1">Ekspedisi JNE</h4>
                                    <p class="text-white mb-0">Estimasi sampai 2–5 Mei</p>
                                </label>
                            </div>

                            <div class="form-check p-0 !flex !items-center">
                                <input class="form-check-input ms-2 me-0 shrink-0" type="radio" name="delivery"
                                    id="pickup">
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
                            <p class="!mb-4">Alamat ini digunakan sebagai tujuan pengiriman perangkat oleh tim logistik
                            </p>
                            <div class="form-border">
                                <div class="flex gap-3">
                                    <div class="field-set w-1/2">
                                        <label>Provinsi</label>
                                        <select class="form-select">
                                            <option selected>Pilih Provinsi</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="field-set w-1/2">
                                        <label>Kota</label>
                                        <select class="form-select">
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
                                        <select class="form-select">
                                            <option selected>Pilih Kecamatan</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="field-set w-1/2">
                                        <label>Kelurahan</label>
                                        <select class="form-select">
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
                                            placeholder="RT" />
                                    </div>
                                    <div class="field-set w-1/3">
                                        <label>RW</label>
                                        <input type="number" name="rw" id="rw" class="form-control"
                                            placeholder="RW" />
                                    </div>
                                    <div class="field-set w-1/3">
                                        <label>Kode Pos</label>
                                        <input type="number" name="post-code" id="post-code" class="form-control"
                                            placeholder="Kode Pos" />
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
                        <label class="form-check-label text-white" for="agreement">
                            Saya telah membaca dan menyetujui <span class="font-bold text-[#5623D8]">Syarat dan Ketentuan</span> penggunaan layanan
                        </label>
                    </div>
                    <div id="submit">
                        <button class="btn-main btn-fullwidth rounded-3" type="submit">Kirim Pesanan</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
