<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE MGR-2508-226-S</title>
    <style>
        /* RESET DAN BASE STYLING UNTUK DOMPDF */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            color: #333;
            line-height: 1.3;
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
        }

        /* WATERMARK */
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

        /* HEADER STYLING */
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #3b82f6;
        }

        .main-title {
            color: #1e40af;
            font-size: 24pt;
            font-weight: bold;
            margin: 10px 0 5px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sub-title {
            color: #3b82f6;
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* TAX INFO */
        .tax-info {
            text-align: center;
            margin: 15px 0;
        }

        .tax-badge {
            display: inline-block;
            background-color: #e8f1ff;
            color: #1e40af;
            padding: 5px 12px;
            border-radius: 15px;
            margin: 0 5px;
            font-size: 9pt;
            font-weight: bold;
            border: 1px solid #b8d4ff;
        }

        /* TABEL UTAMA */
        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 10pt;
        }

        .main-table th {
            background-color: #1e40af;
            color: white;
            padding: 12px 10px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #1e40af;
        }

        .main-table td {
            padding: 10px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        .main-table .section-title {
            background-color: #e8f1ff;
            font-weight: bold;
            color: #1e40af;
            padding: 12px 10px;
        }

        /* DATA TABLE */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 10pt;
        }

        .data-table td {
            padding: 10px 8px;
            border: 1px solid #ddd;
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

        .data-table .sub-row td:first-child {
            padding-left: 30px;
            font-style: italic;
        }

        /* AMOUNT TABLE */
        .amount-table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 10pt;
        }

        .amount-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }

        .amount-table .total-row {
            background-color: #e8f1ff;
            font-weight: bold;
            border-top: 2px solid #3b82f6;
            border-bottom: none;
        }

        /* ALIGNMENT */
        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        /* COLOR STYLING */
        .blue-text {
            color: #1e40af;
            font-weight: bold;
        }

        .amount {
            font-family: 'Courier New', monospace;
            font-weight: bold;
        }

        /* INFO BOX */
        .info-box {
            background-color: #f0f7ff;
            border: 2px solid #3b82f6;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }

        /* TOTAL BOX */
        .total-box {
            background: linear-gradient(to right, #1e40af, #3b82f6);
            color: white;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }

        .total-amount {
            font-size: 32pt;
            font-weight: bold;
            margin: 10px 0;
            letter-spacing: 1px;
            font-family: 'Courier New', monospace;
        }

        /* SIGNATURE */
        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .signature-line {
            border-top: 2px solid #3b82f6;
            padding-top: 10px;
            width: 250px;
            margin-left: auto;
        }

        .signature-name {
            color: #1e40af;
            font-weight: bold;
            margin-top: 5px;
        }

        /* PAGE BREAK */
        .page-break {
            page-break-before: always;
            padding-top: 40px;
        }

        /* SPACING */
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
    </style>
</head>

<body>
    <!-- PAGE 1: RECEIPT -->
    <div class="page">
        <div class="watermark">PAID</div>

        <!-- HEADER -->
        <div class="header">
            <h1 class="main-title">OFFICIAL RECEIPT</h1>
            <h2 class="sub-title">(Kwitansi)</h2>

            <div class="tax-info">
                <span class="tax-badge">NPWP : 01.061.120.0-093.000</span>
                <span class="tax-badge">NPPKP : 01.061.120.0-093.000</span>
                <span class="tax-badge">Tgl. Pengukuhan : 17 Mei 2018</span>
            </div>
        </div>

        <!-- RECEIPT INFORMATION -->
        <table class="main-table mb-20">
            <tr>
                <th colspan="4" class="section-title">Informasi Kwitansi</th>
            </tr>
            <tr>
                <td width="25%"><strong>No. Kwitansi</strong></td>
                <td width="25%" class="blue-text">MGR-2508-226-S</td>
                <td width="25%"><strong>Tanggal Bayar</strong></td>
                <td width="25%" class="blue-text">2025-08-26</td>
            </tr>
            <tr>
                <td><strong>Terima dari</strong></td>
                <td colspan="3">CV. Perusahaan Mangoes Retail</td>
            </tr>
            <tr>
                <td><strong>NPWP</strong></td>
                <td colspan="3">01.000.013.1-093.000</td>
            </tr>
            <tr>
                <td><strong>Untuk pembayaran</strong></td>
                <td colspan="3">Mangoes Retail CV. Perusahaan Mangoes Retail</td>
            </tr>
            <tr>
                <td><strong>Nomor invoice</strong></td>
                <td colspan="3" class="blue-text">MGR-2508-226-S</td>
            </tr>
        </table>

        <!-- AMOUNT DETAILS -->
        <table class="amount-table">
            <tr>
                <td>Harga DPP</td>
                <td class="text-right amount">IDR 8.900.000</td>
            </tr>
            <tr>
                <td>DPP Nilai Lain</td>
                <td class="text-right amount">IDR 8.158.333</td>
            </tr>
            <tr>
                <td>PPN 12%</td>
                <td class="text-right amount">IDR 979.000</td>
            </tr>
            <tr>
                <td>Service Fee</td>
                <td class="text-right amount">IDR 1.750</td>
            </tr>
            <tr class="total-row">
                <td><strong>TOTAL</strong></td>
                <td class="text-right amount" style="color: #1e40af;">IDR 9.880.750</td>
            </tr>
        </table>

        <!-- TOTAL BOX -->
        <div class="total-box">
            <div style="font-size: 11pt; opacity: 0.9;">TOTAL PEMBAYARAN</div>
            <div class="total-amount">IDR 9.880.750</div>
            <div style="font-size: 10pt; opacity: 0.9; margin-top: 10px;">
                <strong>Terbilang:</strong> Sembilan Juta Delapan Ratus Delapan Puluh Ribu Tujuh Ratus Lima Puluh Rupiah
            </div>
        </div>

        <!-- SIGNATURE -->
        <div class="signature">
            <div class="signature-line">
                <div>Jakarta, 2025-08-26</div>
                <div class="signature-name">Achmad Fadillah</div>
                <div>PJ AVP Billing & Collection</div>
            </div>
        </div>
    </div>

    <!-- PAGE 2: INVOICE -->
    <div class="page page-break">
        <div class="watermark">INVOICE</div>

        <!-- HEADER -->
        <div class="header">
            <h1 class="main-title">INVOICE</h1>
        </div>

        <!-- INVOICE INFORMATION -->
        <table class="main-table mb-20">
            <tr>
                <th width="25%">Nomor Invoice</th>
                <th width="25%">Tanggal Invoice</th>
                <th width="25%">Tgl Bayar</th>
                <th width="25%">ID Pesanan</th>
            </tr>
            <tr>
                <td class="blue-text">MGR-2508-226-S</td>
                <td>2025-08-26</td>
                <td>2025-08-26</td>
                <td>MGR-250826-0014</td>
            </tr>
        </table>

        <!-- CUSTOMER INFORMATION -->
        <div class="info-box mb-20">
            <table width="100%">
                <tr>
                    <td width="30%"><strong>Nama Badan</strong></td>
                    <td width="70%" class="blue-text">CV. Perusahaan Mangoes Retail</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>PERUMAHAN KARANG INDAH BJ 48 C</td>
                </tr>
                <tr>
                    <td><strong>NPWP</strong></td>
                    <td>01.000.013.1-093.000</td>
                </tr>
                <tr>
                    <td><strong>Total Biaya Keseluruhan</strong></td>
                    <td class="blue-text">IDR 9.880.750</td>
                </tr>
                <tr>
                    <td><strong>Terbilang</strong></td>
                    <td class="blue-text">Sembilan Juta Delapan Ratus Delapan Puluh Ribu Tujuh Ratus Lima Puluh Rupiah
                    </td>
                </tr>
            </table>
        </div>

        <!-- ITEMS TABLE -->
        <table class="data-table">
            <tr>
                <th width="5%">No</th>
                <th width="25%">Perangkat</th>
                <th width="15%">Periode</th>
                <th width="15%">Biaya</th>
                <th width="10%">Qty</th>
                <th width="30%">Jumlah Biaya (Rp)</th>
            </tr>
            <tr>
                <td>1</td>
                <td>User Terminal</td>
                <td>OTC</td>
                <td class="text-right amount">8.900.000</td>
                <td class="text-center">1</td>
                <td class="text-right amount">8.900.000</td>
            </tr>

            <!-- DETAILED CALCULATION -->
            <tr class="sub-row">
                <td colspan="5">Harga DPP</td>
                <td class="text-right">Rp 8.900.000</td>
            </tr>
            <tr class="sub-row">
                <td colspan="5">DPP Nilai Lain (11/12 x Harga Jual)</td>
                <td class="text-right">Rp 8.158.333</td>
            </tr>
            <tr class="sub-row">
                <td colspan="5">PPN 12% (12% x DPP Nilai Lain)</td>
                <td class="text-right">Rp 979.000</td>
            </tr>
            <tr class="sub-row">
                <td colspan="5">Total Tagihan</td>
                <td class="text-right">Rp 9.879.000</td>
            </tr>
            <tr class="sub-row">
                <td colspan="5">Service Fee</td>
                <td class="text-right">Rp 1.750</td>
            </tr>

            <!-- GRAND TOTAL -->
            <tr class="total-row">
                <td colspan="5" class="text-right"><strong>Total Biaya Keseluruhan</strong></td>
                <td class="text-right blue-text amount">IDR 9.880.750</td>
            </tr>
        </table>

        <!-- SIGNATURE -->
        <div class="signature mt-40">
            <div class="signature-line">
                <div>Jakarta, 2025-08-26</div>
                <div class="signature-name">Achmad Fadillah</div>
                <div>PJ AVP Billing & Collection</div>
            </div>
        </div>
    </div>
</body>

</html>
