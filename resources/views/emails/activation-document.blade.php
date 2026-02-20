<table width="600" cellpadding="0" cellspacing="0"
    style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08);">

    <!-- Header -->
    <tr>
        <td style="background-color:#5623d8; text-align:center; padding:20px;">
            <h1 style="color:#ffffff; margin:0; font-size:22px;">
                Notifikasi VSATLink
            </h1>
        </td>
    </tr>

    <!-- Body -->
    <tr>
        <td style="padding:30px; color:#333333;">
            <p style="margin-top:0; font-size:15px;">
                Yth. <strong>Bapak/Ibu {{ $nota->order->customer->name }}</strong>,
            </p>

            <p style="font-size:15px; line-height:1.6;">
                Kami informasikan bahwa layanan <strong>VSATLink</strong> untuk pesanan
                <strong>{{ $nota->order->unique_order }}</strong> telah berhasil
                <strong>diaktivasi</strong>.
            </p>

            <!-- Aktivasi Detail Box -->
            <table width="100%" cellpadding="0" cellspacing="0"
                style="background-color:#f8f7ff; border-left:4px solid #5623d8; padding:20px; margin:20px 0;">
                <tr>
                    <td style="font-size:14px; line-height:1.8;">
                        <strong>Detail Aktivasi</strong><br><br>
                        <strong>ID Pesanan:</strong> {{ $nota->order->unique_order }}<br>
                        <strong>Produk:</strong> {{ $nota->order->product->name }}<br>
                        <strong>Tanggal Instalasi:</strong>
                        {{ \Carbon\Carbon::parse($nota->installation_date)->translatedFormat('d F Y') }}<br>
                        <strong>Waktu Online:</strong>
                        {{ \Carbon\Carbon::parse($nota->online_date)->translatedFormat('d F Y H:i') }}
                    </td>
                </tr>
            </table>

            <p style="font-size:14px; line-height:1.6;">
                Bersama email ini, kami sampaikan
                <strong>Surat Pernyataan Aktivasi</strong> dalam bentuk
                <strong>preview</strong> untuk ditinjau oleh Bapak/Ibu.
            </p>

            <p style="font-size:14px; line-height:1.6;">
                Untuk melakukan <strong>finalisasi aktivasi layanan</strong>,
                kami mohon kesediaan Bapak/Ibu untuk memberikan
                <strong>tanda tangan persetujuan</strong> pada
                Surat Pernyataan Aktivasi melalui website kami.
            </p>

            <p style="font-size:14px; line-height:1.6;">
                Setelah dokumen ditandatangani, status aktivasi akan kami
                tetapkan sebagai <strong>final</strong> dan berlaku secara resmi.
            </p>

            <p style="margin-top:25px; font-size:14px;">
                Hormat kami,<br>
                <strong>VSATLink Center</strong>
            </p>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background-color:#f0f0f0; padding:15px; text-align:center; font-size:12px; color:#777777;">
            Email ini dikirim secara otomatis oleh sistem VSATLink.<br>
            Mohon tidak membalas email ini.
        </td>
    </tr>

</table>
