<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>SURAT PERNYATAAN AKTIVASI {{ $nota->order->unique_order }}</title>
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
            line-height: 1.5;
            background: #fff;
        }

        @page {
            size: A4;
            margin: 15mm;
        }

        .page {
            max-width: 210mm;
            margin: auto;
            padding: 15mm;
            position: relative;
        }

        .watermark {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 100px;
            color: rgba(90, 56, 223, 0.08);
            font-weight: bold;
            z-index: -1;
            white-space: nowrap;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #5A38DF;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .logo-img {
            width: 180px;
            margin-bottom: 10px;
        }

        .main-title {
            color: #5A38DF;
            font-size: 22pt;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .sub-title {
            color: #5A38DF;
            font-size: 14pt;
            margin-top: 5px;
        }

        .company-info {
            font-size: 9pt;
            color: #666;
            margin-top: 10px;
        }

        .section-title {
            background: #e8f1ff;
            color: #5A38DF;
            font-weight: bold;
            padding: 8px;
            border: 1px solid #5A38DF;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
        }

        th {
            background: #f8fafc;
            color: #5A38DF;
            text-align: left;
        }

        .info-box {
            background: #f0f7ff;
            border: 1px solid #5A38DF;
            border-radius: 4px;
            padding: 12px;
            margin-top: 20px;
        }

        .paragraph {
            text-align: justify;
        }

        .signature-area {
            margin-top: 35px;
            width: 100%;
        }

        .signature-area,
        .signature-area td {
            border: none !important;
            padding: 0;
        }

        .signature-box {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .auto-sign-img {
            display: block;
            margin: 16px auto;
            height: 30px;
        }

        .sign-img {
            display: block;
            margin: 16px auto;
            height: 45px;
        }

        .signature-line {
            border-top: 1px solid #5A38DF;
            margin: 2px auto 5px;
            width: 200px;
        }

        .signature-name {
            font-weight: bold;
            color: #5A38DF;
        }

        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 8pt;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="watermark">AKTIVASI</div>

        <div class="header">
            <img src="{{ public_path('/images/vsatlink.png') }}" class="logo-img">
            <div class="main-title">SURAT PERNYATAAN AKTIVASI</div>
            <div class="company-info">
                PT. VSATLink Indonesia<br>
                Jl. Sholeh Iskandar No.KM 6, Kota Bogor - Jawa Barat<br>
                Telp: 021-12345678 | Email: support@vsatlink.co.id
            </div>
        </div>

        <div class="section-title">DATA PELANGGAN</div>
        <table>
            <tr>
                <td width="30%"><strong>Nama Pelanggan</strong></td>
                <td width="70%">{{ $nota->order->customer->name }}</td>
            </tr>
            <tr>
                <td><strong>No. Pesanan</strong></td>
                <td class="blue-text">{{ $nota->order->unique_order }}</td>
            </tr>
            <tr>
                <td><strong>Alamat Instalasi</strong></td>
                <td>{{ $nota->order->activation_address->google_maps_url ?? '-' }}</td>
            </tr>
        </table>

        <div class="section-title">INFORMASI AKTIVASI</div>
        <table>
            <tr>
                <td width="30%"><strong>Tanggal Instalasi</strong></td>
                <td width="70%">{{ \Carbon\Carbon::parse($nota->installation_date)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td width="30%"><strong>Waktu Aktivasi Berhasil</strong></td>
                <td width="70%">{{ \Carbon\Carbon::parse($nota->online_date)->translatedFormat('H:i | d F Y') }}</td>
            </tr>
        </table>

        <div class="info-box">
            <p class="paragraph">
                Dengan ini pelanggan menyatakan bahwa perangkat dan layanan VSAT dari
                <strong>PT. VSATLink Indonesia</strong> telah terpasang, terkonfigurasi,
                dan berfungsi dengan baik sesuai dengan spesifikasi yang disepakati.

                Dengan ditandatanganinya surat ini, pelanggan menyetujui bahwa layanan
                telah resmi <strong>AKTIF</strong> dan tunduk pada syarat & ketentuan
                layanan yang berlaku.
            </p>
        </div>

        <table class="signature-area">
            <tr>
                <td class="signature-box">
                    <div class="signature-customer">
                        <strong>Pelanggan</strong>
                    </div>
                    <img src="{{ public_path('/images/vsatlink.png') }}" class="auto-sign-img">
                    <div style="font-size:8pt;color:#888;">
                        Ditandatangani otomatis oleh sistem
                    </div>
                    <div class="signature-line"></div>
                    <div class="signature-name">{{ $nota->order->customer->name }}</div>
                    <div>Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
                </td>

                <td class="signature-box">
                    <div class="signature-company">
                        <strong>PT. VSATLink Indonesia</strong>
                    </div>
                    <img src="{{ public_path('/images/sign.png') }}" class="sign-img">
                    <div class="signature-line"></div>
                    <div class="signature-name">Tim Service Operation</div>
                    <div>Bogor, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
                </td>
            </tr>
        </table>

        <div class="footer">
            Dokumen ini sah dan diterbitkan secara sistem.<br>
            Surat Pernyataan Aktivasi – {{ $nota->order->unique_order }}<br>
            Generated: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i:s') }}
        </div>
    </div>
</body>

</html>
