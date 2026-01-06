<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE {{ $order->unique_order }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            font-size: 10pt;
            color: #333;
            line-height: 1.4;
            background: white;
        }

        @page {
            size: A4;
            margin: 15mm;
        }

        .page {
            width: auto;
            max-width: 210mm;
            margin: 0 auto;
            padding: 15mm;
            position: relative;
        }

        .watermark {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 120px;
            color: rgba(59, 130, 246, 0.08);
            font-weight: bold;
            z-index: -1;
            white-space: nowrap;
            opacity: 0.7;
        }

        .logo-img {
            object-fit: contain;
            margin: auto;
            width: 180px;
            height: auto;
        }

        .sign-img {
            object-fit: contain;
            margin-bottom: 8px;
            width: 80px;
            height: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #5A38DF;
        }

        .main-title {
            color: #5A38DF;
            font-size: 24pt;
            font-weight: bold;
            margin: 10px 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sub-title {
            color: #5A38DF;
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .company-info {
            color: #666;
            font-size: 9pt;
            line-height: 1.4;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 10pt;
        }

        .main-table th {
            background-color: #5A38DF;
            color: white;
            padding: 10px 8px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #5A38DF;
        }

        .main-table td {
            padding: 8px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .main-table .section-title {
            background-color: #e8f1ff;
            font-weight: bold;
            color: #5A38DF;
            padding: 10px 8px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            font-size: 10pt;
        }

        .data-table th {
            background-color: #f8fafc;
            color: #5A38DF;
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
            font-weight: bold;
        }

        .data-table td {
            padding: 8px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .data-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .data-table .total-row {
            background-color: #e8f1ff;
            font-weight: bold;
        }

        .data-table .sub-row {
            background-color: #f0f7ff;
            font-size: 9pt;
            color: #555;
        }

        .amount-table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px 0 20px auto;
            font-size: 10pt;
        }

        .amount-table td {
            padding: 8px 12px;
            border-bottom: 1px solid #ddd;
        }

        .amount-table .total-row {
            background-color: #e8f1ff;
            font-weight: bold;
            border-top: 2px solid #5A38DF;
            border-bottom: none;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .blue-text {
            color: #5A38DF;
            font-weight: bold;
        }

        .amount {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            white-space: nowrap;
        }

        .info-box {
            background-color: #f0f7ff;
            border: 1px solid #5A38DF;
            border-radius: 4px;
            padding: 12px;
            margin: 15px 0;
        }

        .signature {
            text-align: right;
        }

        .signature-line {
            border-top: 1px solid #5A38DF;
            padding-top: 10px;
            width: 250px;
            margin-left: auto;
        }

        .signature-name {
            color: #5A38DF;
            font-weight: bold;
            margin-top: 5px;
        }

        .page-break {
            page-break-before: always;
            padding-top: 40px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .mb-15 {
            margin-bottom: 15px;
        }

        .mb-20 {
            margin-bottom: 20px;
        }

        .mb-25 {
            margin-bottom: 25px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mt-40 {
            margin-top: 40px;
        }

        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 8pt;
            color: #666;
            text-align: center;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 8pt;
            font-weight: bold;
            margin-left: 10px;
        }

        .badge-paid {
            background-color: #10b981;
            color: white;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="watermark">{{ $order->payment_success ? 'PAID' : 'PENDING' }}</div>

        <div class="header">
            <img src="{{ public_path('/images/vsatlink.png') }}" class="logo-img">
            <h1 class="main-title">OFFICIAL RECEIPT</h1>
            <h2 class="sub-title">(Kwitansi)</h2>
            <div class="company-info mb-20">
                PT. VsatLink Indonesia<br>
                Jl. Sholeh Iskandar No.KM 6, RT.04/RW.01, Cibadak, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16166<br>
                Telp: 021-12345678 | Email: billing@vsatlink.co.id<br>
                NPWP: 01.234.567.8-901.000
            </div>
        </div>

        <table class="main-table mb-20">
            <tr>
                <th colspan="4" class="section-title">Informasi Kwitansi</th>
            </tr>
            <tr>
                <td width="25%"><strong>No. Kwitansi</strong></td>
                <td width="25%" class="blue-text">{{ $order->unique_order }}</td>
                <td width="25%"><strong>Tanggal Bayar</strong></td>
                <td width="25%" class="blue-text">
                    {{ $order->payment_date ? date('Y-m-d', strtotime($order->payment_date)) : 'Belum Dibayar' }}</td>
            </tr>
            <tr>
                <td><strong>Status Pembayaran</strong></td>
                <td colspan="3">
                    LUNAS
                </td>
            </tr>
            <tr>
                <td><strong>Terima dari</strong></td>
                <td colspan="3">
                    {{ $order->customer->name }}
                    @if ($order->customer->company_representative_name)
                        <br><small>Atas nama: {{ $order->customer->company_representative_name }}</small>
                    @endif
                </td>
            </tr>
            <tr>
                <td><strong>NPWP</strong></td>
                <td colspan="3">{{ $order->customer->npwp }}</td>
            </tr>
            <tr>
                <td><strong>Untuk pembayaran</strong></td>
                <td colspan="3">Pembelian {{ $order->product->name }} - {{ $order->unique_order }}</td>
            </tr>
            <tr>
                <td><strong>Metode Pembayaran</strong></td>
                <td colspan="3">{{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}</td>
            </tr>
        </table>

        <table class="amount-table">
            <tr>
                <td>Harga Produk (OTC)</td>
                <td class="text-right amount">Rp{{ number_format($order->product_cost, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Biaya Instalasi</td>
                <td class="text-right amount">
                    Rp{{ number_format(
                        ($order->installation_service_cost ?? 0) + ($order->installation_transport_cost ?? 0),
                        0,
                        ',',
                        '.',
                    ) }}
                </td>
            </tr>
            @if ($order->shipping_cost > 0)
                <tr>
                    <td>Biaya Pengiriman ({{ $order->shipping }})</td>
                    <td class="text-right amount">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</td>
                </tr>
            @endif
            @if ($order->tax_cost > 0)
                <tr>
                    <td>PPN 11%</td>
                    <td class="text-right amount">Rp{{ number_format($order->tax_cost, 0, ',', '.') }}</td>
                </tr>
            @endif
            <tr class="total-row">
                <td><strong>TOTAL</strong></td>
                <td class="text-right amount" style="color: #5A38DF;">
                    Rp{{ number_format($order->total_cost, 0, ',', '.') }}</td>
            </tr>
        </table>

        <div class="signature">
            <img src="{{ public_path('/images/sign.png') }}" class="sign-img">

            <div class="signature-line">
                <div>Bogor, {{ date('Y-m-d') }}</div>
                <div class="signature-name">Rachman Saputra</div>
                <div>AVP Billing & Collection</div>
            </div>
        </div>

        <div class="footer">
            Invoice ini sah dan dapat digunakan sebagai bukti pembayaran yang sah.<br>
            Untuk pertanyaan silakan hubungi: billing@vsatlink.co.id | 021-12345678<br>
            Invoice No: {{ $order->unique_order }} | Generated: {{ date('Y-m-d H:i:s') }}
        </div>
    </div>

    <div class="page page-break">
        <div class="watermark">INVOICE</div>

        <div class="header">
            <img src="{{ public_path('/images/vsatlink.png') }}" class="logo-img">
            <h1 class="main-title">DETAIL INVOICE</h1>
        </div>

        <table class="main-table mb-20">
            <tr>
                <th width="20%">Nomor Invoice</th>
                <th width="20%">Tanggal Invoice</th>
                <th width="20%">Tgl Jatuh Tempo</th>
                <th width="20%">ID Pesanan</th>
            </tr>
            <tr>
                <td class="blue-text">{{ $order->unique_order }}</td>
                <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                <td>{{ $order->payment_date ? date('Y-m-d', strtotime($order->payment_date)) : '7 hari dari invoice' }}
                </td>
                <td>{{ $order->unique_order }}</td>
            </tr>
        </table>

        <div class="info-box mb-20">
            <table width="100%">
                <tr>
                    <td width="30%"><strong>Pelanggan</strong></td>
                    <td width="70%" class="blue-text">{{ $order->customer->name }}</td>
                </tr>
                @if ($order->customer->customer_type != 'Perorangan')
                    <tr>
                        <td><strong>Perusahaan</strong></td>
                        <td>{{ $order->customer->company_representative_name ?? '-' }}</td>
                    </tr>
                @endif
                @if ($order->shipping == 'JNE')
                    <tr>
                        <td><strong>Alamat Pengiriman</strong></td>
                        <td>
                            {{ $order->customer->full_address ?? '-' }}<br>
                            {{ $order->order_address?->village()->name ?? '-' }},
                            {{ $order->order_address?->district()->name ?? '-' }}<br>
                            {{ $order->order_address?->city()->name ?? '-' }},
                            {{ $order->order_address?->province()->name ?? '-' }}
                            {{ $order->order_address?->village()->postal_code ?? '-' }}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td><strong>Pengambilan Barang</strong></td>
                        <td>
                            <strong>Ambil di Tempat</strong><br>
                            Alamat Pengambilan:<br>
                            Jl. Sholeh Iskandar No. KM 6, RT.04/RW.01,<br>
                            Cibadak, Kec. Tanah Sereal,<br>
                            Kota Bogor, Jawa Barat 16166
                        </td>
                    </tr>
                @endif
                <tr>
                    <td><strong>Kontak</strong></td>
                    <td>
                        {{ $order->order_contact?->name }}<br>
                        Telp: {{ $order->order_contact?->phone }} | Email: {{ $order->order_contact?->email }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Sales</strong></td>
                    <td>{{ $order->customer->sales->name ?? 'Sales Admin' }}</td>
                </tr>
            </table>
        </div>

        <table class="data-table mb-20">
            <tr>
                <th colspan="6" style="background-color: #5A38DF; color: white;">RINCIAN PRODUK</th>
            </tr>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Produk & Spesifikasi</th>
                <th width="15%">Tipe Biaya</th>
                <th width="15%">Biaya Satuan</th>
                <th width="10%">Qty</th>
                <th width="20%">Jumlah (Rp)</th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td>
                    <strong>{{ $order->product->name }}</strong><br>
                    <small>
                        <strong>Spesifikasi:</strong><br>
                        • {{ $order->product->antena }}<br>
                        • {{ $order->product->lnb }}<br>
                        • {{ $order->product->buc }}<br>
                        • {{ $order->product->modem }}<br>
                        @if ($order->product->access_point)
                            • {{ $order->product->access_point }}<br>
                        @endif
                    </small>
                </td>
                <td>OTC</td>
                <td class="text-right amount">Rp{{ number_format($order->product_cost, 0, ',', '.') }}</td>
                <td class="text-center">1</td>
                <td class="text-right amount">Rp{{ number_format($order->product_cost, 0, ',', '.') }}</td>
            </tr>

            <tr>
                <td class="text-center">2</td>
                <td>Jasa Instalasi & Konfigurasi</td>
                <td>OTC</td>
                <td class="text-right amount">
                    Rp{{ number_format(($order->installation_service_cost ?? 0) + ($order->installation_transport_cost ?? 0), 0, ',', '.') }}
                </td>
                <td class="text-center">1</td>
                <td class="text-right amount">
                    Rp{{ number_format(($order->installation_service_cost ?? 0) + ($order->installation_transport_cost ?? 0), 0, ',', '.') }}
                </td>
            </tr>

            @if ($order->shipping_cost > 0)
                <tr>
                    <td class="text-center">4</td>
                    <td>Pengiriman via {{ $order->shipping }}</td>
                    <td>OTC</td>
                    <td class="text-right amount">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</td>
                    <td class="text-center">1</td>
                    <td class="text-right amount">Rp{{ number_format($order->shipping_cost, 0, ',', '.') }}</td>
                </tr>
            @endif

            <tr class="sub-row">
                <td colspan="5" class="text-right"><strong>Subtotal</strong></td>
                <td class="text-right">
                    Rp{{ number_format(
                        $order->product_cost +
                            $order->installation_service_cost +
                            $order->installation_transport_cost +
                            $order->shipping_cost,
                        0,
                        ',',
                        '.',
                    ) }}
                </td>
            </tr>

            @if ($order->tax_cost > 0)
                <tr class="sub-row">
                    <td colspan="5" class="text-right">PPN 10%</td>
                    <td class="text-right">Rp{{ number_format($order->tax_cost, 0, ',', '.') }}</td>
                </tr>
            @endif

            <tr class="total-row">
                <td colspan="5" class="text-right"><strong>TOTAL KESELURUHAN</strong></td>
                <td class="text-right blue-text amount">Rp{{ number_format($order->total_cost, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="page page-break">
        <div class="watermark">INVOICE</div>

        <div class="info-box mb-20">
            <h4 style="color: #5A38DF; margin-bottom: 10px;">INFORMASI PEMBAYARAN</h4>
            <table width="100%">
                <tr>
                    <td width="30%"><strong>Status Pembayaran</strong></td>
                    <td width="70%">Lunas</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Pembayaran</strong></td>
                    <td>{{ date('Y-m-d H:i:s', strtotime($order->payment_date)) }}</td>
                </tr>
                <tr>
                    <td><strong>Metode Pembayaran</strong></td>
                    <td>{{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}</td>
                </tr>
            </table>
        </div>

        <div class="info-box mb-20">
            <h4 style="color: #5A38DF; margin-bottom: 10px;">INFORMASI INSTALASI</h4>
            <table width="100%">
                <tr>
                    <td width="30%"><strong>Lokasi Instalasi</strong></td>
                    <td width="70%">
                        Alamat instalasi sesuai dengan alamat aktivasi terdaftar<br />
                        {{ $order->activation_address->google_maps_url }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Jadwal Instalasi</strong></td>
                    <td>Akan dijadwalkan setelah perangkat diterima pelanggan</td>
                </tr>
                <tr>
                    <td><strong>Kontak Teknis</strong></td>
                    <td>Tim instalasi akan menghubungi via telepon sebelum kedatangan</td>
                </tr>
            </table>
        </div>

        <div class="signature mt-30">
            <img src="{{ public_path('/images/sign.png') }}" class="sign-img">
            <div class="signature-line">
                <div>Bogor, {{ date('Y-m-d') }}</div>
                <div class="signature-name">Dewi Lestari</div>
                <div>Sales Executive - VSATLink Indonesia</div>
            </div>
        </div>

        <div class="footer">
            Invoice ini sah dan dapat digunakan sebagai bukti pembayaran yang sah.<br>
            Untuk pertanyaan silakan hubungi: billing@vsatlink.co.id | 021-12345678<br>
            Invoice No: {{ $order->unique_order }} | Generated: {{ date('Y-m-d H:i:s') }}
        </div>
    </div>

    <div class="page page-break">
        <div class="watermark">TERMS</div>

        <div class="header">
            <img src="{{ public_path('/images/vsatlink.png') }}" class="logo-img">
            <h1 class="main-title" style="font-size:20pt;">SYARAT & KETENTUAN</h1>
            <h2 class="sub-title" style="font-size:12pt;">Penggunaan Layanan VSAT</h2>
        </div>

        <div class="terms">
            <h4>1. Ketentuan Umum</h4>
            <p>
                Syarat dan ketentuan ini mengatur penggunaan layanan VSAT yang disediakan
                melalui sistem VSATLink. Dengan menggunakan layanan ini, pelanggan
                menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan.
            </p>

            <h4>2. Ruang Lingkup Layanan</h4>
            <p>
                Layanan meliputi pemesanan, pembayaran, pengiriman perangkat, instalasi,
                aktivasi, pemantauan status, serta pengelolaan dokumen terkait layanan.
            </p>

            <h4>3. Kewajiban dan Tanggung Jawab Pelanggan</h4>
            <p>
                Pelanggan wajib memberikan data yang benar dan bertanggung jawab
                atas kesiapan lokasi instalasi dan akses teknis.
            </p>

            <h4>4. Pembayaran</h4>
            <p>
                Pembayaran dilakukan sesuai invoice resmi. Pembayaran yang telah
                diverifikasi tidak dapat dibatalkan secara sepihak.
            </p>

            <h4>5. Pengiriman Perangkat</h4>
            <p>
                Risiko keterlambatan pengiriman akibat pihak ekspedisi berada
                di luar tanggung jawab penyedia layanan.
            </p>

            <h4>6. Instalasi dan Aktivasi</h4>
            <p>
                Aktivasi dilakukan setelah perangkat diterima dan seluruh persyaratan
                teknis dan administratif terpenuhi.
            </p>

            <h4>7. Gangguan Layanan</h4>
            <p>
                Gangguan dapat terjadi akibat faktor teknis, cuaca, atau kondisi eksternal lainnya.
            </p>

            <h4>8. Batasan Tanggung Jawab</h4>
            <p>
                Penyedia layanan tidak bertanggung jawab atas kerugian akibat kesalahan
                penggunaan atau faktor di luar kendali operasional.
            </p>

            <h4>9. Force Majeure</h4>
            <p>
                Kegagalan layanan akibat keadaan kahar tidak menjadi tanggung jawab penyedia layanan.
            </p>

            <h4>10. Persetujuan</h4>
            <p>
                Dengan melakukan pembayaran, pelanggan dianggap telah menyetujui
                seluruh syarat dan ketentuan ini.
            </p>
        </div>

        <div class="signature mt-40">
            <div class="signature-line">
                <div class="signature-name">Disetujui secara elektronik</div>
                <div>Tanggal: 2025-08-26</div>
            </div>
        </div>

        <div class="footer">
            Invoice ini sah dan dapat digunakan sebagai bukti pembayaran yang sah.<br>
            Untuk pertanyaan silakan hubungi: billing@vsatlink.co.id | 021-12345678<br>
            Invoice No: {{ $order->unique_order }} | Generated: {{ date('Y-m-d H:i:s') }}
        </div>
    </div>
</body>

</html>
