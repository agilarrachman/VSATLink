<table width="600" cellpadding="0" cellspacing="0"
    style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.08);">
    <!-- Header -->
    <tr>
        <td style="background-color:#5623d8; text-align:center;">
            <h1 style="color: white;">Notifikasi VSATLink</h1>
        </td>
    </tr>

    <!-- Body -->
    <tr>
        <td style="padding:30px; color:#333333;">
            <p style="margin-top:0; font-size:15px;">
                Yth. <strong>Tim Teknisi VSATLink</strong>,
            </p>

            <p style="font-size:15px; line-height:1.6;">
                Kami informasikan bahwa jadwal instalasi dan aktivasi untuk pesanan berikut
                <strong>perlu dilakukan penjadwalan ulang</strong>, dikarenakan
                <strong>customer menolak jadwal yang telah ditentukan</strong>.
            </p>

            <table width="100%" cellpadding="0" cellspacing="0"
                style="background-color:#f8f7ff; border-left:4px solid #5623d8; padding:20px; margin:20px 0;">
                <tr>
                    <td style="font-size:14px; line-height:1.8;">
                        <strong>Detail Pesanan & Jadwal</strong><br><br>
                        <strong>Nama Customer:</strong> {{ $customer_name }}<br>
                        <strong>Kode Pesanan:</strong> {{ $unique_order }}<br>
                        <strong>Produk:</strong> {{ $product_name }}<br>
                        <strong>Jadwal Sebelumnya:</strong> ({{ $installation_session }}) | {{ $installation_date }}
                    </td>
                </tr>
            </table>

            <table width="100%" cellpadding="0" cellspacing="0"
                style="background-color:#fff4f4; border-left:4px solid #d9534f; padding:20px; margin:20px 0;">
                <tr>
                    <td style="font-size:14px; line-height:1.8;">
                        <strong>Alasan Penolakan dari Customer</strong><br><br>
                        {{ $reject_reason }}
                    </td>
                </tr>
            </table>

            <p style="font-size:14px; line-height:1.6;">
                Mohon bantuan Tim Teknisi untuk <strong>mengatur jadwal instalasi dan aktivasi yang baru</strong>
                berdasarkan ketersediaan tim, agar dapat segera ditindaklanjuti oleh tim terkait.
            </p>

            <p style="font-size:14px; margin-bottom:0;">
                Terima kasih atas perhatian dan kerja samanya.
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
