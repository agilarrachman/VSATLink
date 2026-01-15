@extends('layouts.app')

@section('title', 'Pesanan Saya | VSATLink')

@section('midtrans')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script
        src="{{ $isProduction ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ $midtransClientKey }}"></script>
@endsection

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="container z-1000 mt-16 mb-auto">
                <h2 class="mb-5 text-center wow fadeInUp">Riwayat Pesanan</h2>

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
                            'Menunggu Konfirmasi',
                            'Dikonfirmasi',
                            'Belum Dibayar',
                            'Sedang Diproses',
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

                <div class="orders flex flex-col gap-3">
                    @foreach ($orders as $order)
                        <div role="link" tabindex="0"
                            onclick="window.location.href='{{ url('/detail-pesanan/' . $order->unique_order) }}'"
                            class="padding40 wow fadeInUp rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-white/20 cursor-pointer">
                            <div class="flex flex-col flex-md-row justify-between items-center">
                                <div class="detail flex flex-col flex-md-row items-center gap-4">
                                    <img src="/storage/{{ $order->product->image_url }}" alt="Product Image"
                                        class="rounded-md object-cover w-full md:max-w-[150px]" />
                                    <div class="info w-full mb-3 mb-md-0">
                                        @php($badge = $order->statusBadge())
                                        <div class="status px-3 py-1 rounded-full w-fit mb-2 {{ $badge['class'] }}">
                                            <p class="text-sm mb-0">{{ $badge['label'] }}</p>
                                        </div>
                                        <p class="mb-0 text-white text-sm">
                                            Kode Pesanan: {{ $order->unique_order }}
                                        </p>
                                        <h3 class="mb-0">{{ $order->product->name }}</h3>
                                        <p class="mb-0 text-sm">
                                            Pesanan dibuat pada tanggal {{ $order->created_at->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="action flex flex-col items-end w-full md:w-auto">
                                    @php($action = $order->actionConfig())
                                    @if ($action['show_price'])
                                        <div class="price mb-3">
                                            <p class="font-extrabold text-2xl text-white mb-1 md:text-right">
                                                {{ $order->total_cost ? 'Rp' . number_format($order->total_cost, 0, ',', '.') : '-' }}
                                            </p>

                                            @isset($action['note'])
                                                <p class="text-sm text-white font-medium mb-0">
                                                    {{ $action['note'] }}
                                                </p>
                                            @endisset
                                        </div>
                                    @endif
                                    @if ($action['type'] === 'payment')
                                        <a href="#"
                                            class="btn-primary pay-button !rounded-md py-2 !w-full md:!w-fit flex justify-center"
                                            data-order-id="{{ $order->unique_order }}">
                                            <span>{{ $action['label'] }}</span>
                                        </a>
                                    @else
                                        <a href="{{ $action['url'] }}"
                                            class="btn-primary !rounded-md py-2 !w-full md:!w-fit flex justify-center">
                                            <span>{{ $action['label'] }}</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div
                    class="page mx-0 mt-5 px-3 rounded-10 shadow-lg/10 bg-gray-900/40 backdrop-blur-md border !border-white/20">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>
    </div>

    <script>
        // Script Payment Midtrans Start
        document.querySelectorAll('.pay-button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const orderId = this.dataset.orderId;
                const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/pembayaran/${orderId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        window.snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                window.location.reload();
                            },
                            onPending: function(result) {
                                window.snap.hide();
                            },
                            onError: function(result) {
                                alert('Pembayaran gagal');
                            }
                        });
                    });
            });
        });
        // Script Payment Midtrans End
    </script>
@endsection
