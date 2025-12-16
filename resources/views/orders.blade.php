@extends('layouts.app')

@section('title', 'Pesanan Saya | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="container z-1000 mt-16 mb-auto">
                <h2 class="mb-5 text-center wow fadeInUp">Riwayat Pesanan</h2>

                <!-- Tab Filter -->
                <div class="flex flex-wrap justify-center gap-2 mb-20">
                    @php
                        $tabs = ['Semua', 'Menunggu Konfirmasi', 'Belum Dibayar', 'Sedang Diproses', 'Selesai'];
                        $currentTab = request()->get('status', 'Semua');
                    @endphp
                    @foreach ($tabs as $tab)
                        <a href="{{ url()->current() }}?status={{ $tab }}"
                            class="px-4 py-2 rounded-full font-medium text-sm
               {{ $currentTab === $tab ? 'bg-[var(--primary-color)] text-white' : 'bg-gray-800 text-[var(--primary-color)]' }}">
                            {{ $tab }}
                        </a>
                    @endforeach
                </div>

                <div class="orders flex flex-col gap-3">
                    <div
                        class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-black/40">
                        <div class="flex flex-col flex-md-row justify-between items-center">
                            <div class="detail flex flex-col flex-md-row items-center gap-4">
                                <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                    class="rounded-md object-cover w-full md:max-w-[150px]" />
                                <div class="info w-full mb-3 mb-md-0">
                                    <div
                                        class="status bg-gray-300 px-3 py-1 rounded-full text-[var(--primary-color)] w-fit mb-1">
                                        <p class="text-sm mb-0">
                                            Menunggu Konfirmasi
                                        </p>
                                    </div>
                                    <p class="mb-0 text-white">
                                        Kode Pesanan: VSL7393741
                                    </p>
                                    <h3 class="mb-0">Nama Layanan</h3>
                                    <p class="mb-0">
                                        Pesanan dibuat pada tanggal 19 November
                                        2025
                                    </p>
                                </div>
                            </div>
                            <div class="action flex flex-col items-end w-full md:w-auto">
                                <a class="btn-primary !rounded-md py-2 !w-full flex justify-center" href="#">
                                    <span>Lihat Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-black/40">
                        <div class="flex flex-col flex-md-row justify-between items-center">
                            <div class="detail flex flex-col flex-md-row items-center gap-4">
                                <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                    class="rounded-md object-cover w-full md:max-w-[150px]" />
                                <div class="info w-full mb-3 mb-md-0">
                                    <div class="status bg-[#1073DD] px-3 py-1 rounded-full text-white w-fit mb-1">
                                        <p class="text-sm mb-0">
                                            Belum Dibayar
                                        </p>
                                    </div>
                                    <p class="mb-0 text-white">
                                        Kode Pesanan: VSL7393741
                                    </p>
                                    <h3 class="mb-0">Nama Layanan</h3>
                                    <p class="mb-0">
                                        Pesanan dibuat pada tanggal 19 November
                                        2025
                                    </p>
                                </div>
                            </div>
                            <div class="action flex flex-col md:items-end w-full md:w-auto">
                                <div class="price mb-3">
                                    <p class="font-extrabold text-2xl text-white mb-1 md:text-right">
                                        Rp123.456.000
                                    </p>
                                    <p class="text-sm text-white font-medium mb-0">
                                        *Pesanan otomatis dibatalkan jika
                                        2x24jam tidak dibayarkan
                                    </p>
                                </div>
                                <a class="btn-primary !rounded-md py-2 !w-full md:!w-fit flex justify-center"
                                    href="#">
                                    <span>Bayar Sekarang</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-black/40">
                        <div class="flex flex-col flex-md-row justify-between items-center">
                            <div class="detail flex flex-col flex-md-row items-center gap-4">
                                <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                    class="rounded-md object-cover w-full md:max-w-[150px]" />
                                <div class="info w-full mb-3 mb-md-0">
                                    <div
                                        class="status bg-[var(--primary-color)] px-3 py-1 rounded-full text-white w-fit mb-1">
                                        <p class="text-sm mb-0">
                                            Sedang Diproses
                                        </p>
                                    </div>
                                    <p class="mb-0 text-white">
                                        Kode Pesanan: VSL7393741
                                    </p>
                                    <h3 class="mb-0">Nama Layanan</h3>
                                    <p class="mb-0">
                                        Pesanan dibuat pada tanggal 19 November
                                        2025
                                    </p>
                                </div>
                            </div>
                            <div class="action flex flex-col md:items-end w-full md:w-auto">
                                <div class="price mb-3">
                                    <p class="font-extrabold text-2xl text-white mb-1 md:text-right">
                                        Rp123.456.000
                                    </p>
                                </div>
                                <a class="btn-primary !rounded-md py-2 !w-full md:!w-fit flex justify-center"
                                    href="#">
                                    <span>Lihat Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-black/40">
                        <div class="flex flex-col flex-md-row justify-between items-center">
                            <div class="detail flex flex-col flex-md-row items-center gap-4">
                                <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                    class="rounded-md object-cover w-full md:max-w-[150px]" />
                                <div class="info w-full mb-3 mb-md-0">
                                    <div class="status bg-[#C70808] px-3 py-1 rounded-full text-white w-fit mb-1">
                                        <p class="text-sm mb-0">
                                            Dibatalkan
                                        </p>
                                    </div>
                                    <p class="mb-0 text-white">
                                        Kode Pesanan: VSL7393741
                                    </p>
                                    <h3 class="mb-0">Nama Layanan</h3>
                                    <p class="mb-0">
                                        Pesanan dibuat pada tanggal 19 November
                                        2025
                                    </p>
                                </div>
                            </div>
                            <div class="action flex flex-col md:items-end w-full md:w-auto">
                                <div class="price mb-3">
                                    <p class="font-extrabold text-2xl text-white mb-1 md:text-right">
                                        Rp123.456.000
                                    </p>
                                </div>
                                <a class="btn-primary !rounded-md py-2 !w-full md:!w-fit flex justify-center"
                                    href="#">
                                    <span>Lihat Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-black/40">
                        <div class="flex flex-col flex-md-row justify-between items-center">
                            <div class="detail flex flex-col flex-md-row items-center gap-4">
                                <img src="images/covers/produkVSAT1.png" alt="Product Image"
                                    class="rounded-md object-cover w-full md:max-w-[150px]" />
                                <div class="info w-full mb-3 mb-md-0">
                                    <div class="status bg-[#08C755] px-3 py-1 rounded-full text-white w-fit mb-1">
                                        <p class="text-sm mb-0">
                                            Selesai
                                        </p>
                                    </div>
                                    <p class="mb-0 text-white">
                                        Kode Pesanan: VSL7393741
                                    </p>
                                    <h3 class="mb-0">Nama Layanan</h3>
                                    <p class="mb-0">
                                        Pesanan dibuat pada tanggal 19 November
                                        2025
                                    </p>
                                </div>
                            </div>
                            <div class="action flex flex-col md:items-end w-full md:w-auto">
                                <div class="price mb-3">
                                    <p class="font-extrabold text-2xl text-white mb-1 md:text-right">
                                        Rp123.456.000
                                    </p>
                                </div>
                                <a class="btn-primary !rounded-md py-2 !w-full md:!w-fit flex justify-center"
                                    href="#">
                                    <span>Lihat Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
