@extends('layouts.app')

@section('title', 'Aktivasi Saya | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="container z-1000 mt-16 mb-auto">
                <h2 class="mb-5 text-center wow fadeInUp">Riwayat Aktivasi</h2>

                @if (session()->has('success'))
                    <div class="alert text-white bg-gray-900/40 backdrop-blur-md border !border-white/20 alert-dismissible fade show mb-5 text-left"
                        role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tab Filter -->
                <div class="flex flex-wrap justify-center gap-2 mb-20">
                    @php
                        $tabs = [
                            'Semua',
                            'Sudah Dijadwalkan',
                            'Perjalan Teknisi',
                            'Sedang Diproses',
                            'Belum Ditandatangani',
                            'Selesai',
                        ];
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

                <div class="notas flex flex-col gap-3">
                    @foreach ($notas as $nota)
                        <div role="link" tabindex="0"
                            onclick="window.location.href='{{ url('/detail-pesanan/' . $nota->order->unique_order) }}'"
                            class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-white/20 cursor-pointer">
                            <div class="flex flex-col flex-md-row justify-between items-center">
                                <div class="detail flex flex-col flex-md-row items-center gap-4">
                                    <img src="/storage/{{ $nota->order->product->image_url }}" alt="Product Image"
                                        class="rounded-md object-cover w-full md:max-w-[150px]" />
                                    <div class="info w-full mb-3 mb-md-0">
                                        @php($badge = $nota->statusBadge())
                                        <div class="status px-3 py-1 rounded-full w-fit mb-2 {{ $badge['class'] }}">
                                            <p class="text-sm mb-0">{{ $badge['label'] }}</p>
                                        </div>
                                        <p class="mb-0 text-white text-sm">
                                            Kode Pesanan: {{ $nota->order->unique_order }}
                                        </p>
                                        <h3 class="mb-0">{{ $nota->order->product->name }}</h3>
                                        <p class="mb-0 text-sm">
                                            {{ $nota->installation_date ? 'Jadwal Instalasi pada tanggal ' . $nota->installation_date->translatedFormat('d F Y, H:i') : 'Belum dijadwalkan' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="action flex flex-col items-end w-full md:w-auto">
                                    <a href="/detail-aktivasi/{{ $nota->id }}"
                                        class="btn-primary !rounded-md py-2 !w-full md:!w-fit flex justify-center">
                                        <span>Lihat Detail</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div
                    class="page mx-0 mt-5 px-3 rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-white/20">
                    {{ $notas->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>
    </div>    
@endsection
