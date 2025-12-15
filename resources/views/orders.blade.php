<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk | VSATLink</title>
    <link rel="icon" href="images/icon.webp" type="images/Logo Icon.png" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/orders-style.css">
</head>
<body>
    <div class="content">
        <div class="ellipse-background-purple"></div>

        <div class="w-100 mx-0">
            <div class="container-orders w-100 d-flex flex-column mb-3 mt-5">
                <div
                    class="d-flex flex-row justify-content-between justify-content-center align-items-center w-100 px-4 px-lg-5">
                    <div class="title">
                        Pesanan
                    </div>

                    <div class="d-none d-md-flex btn bg-transparent justify-content-center align-items-center"
                        style="color: white; border: 1px solid white; border-radius: 34px; font-size: 12px;">
                        <select id="filter" class="bg-transparent p-0" style="border: none; color: white;">
                            <option value="newest" style="color: black;">Pesanan Terbaru</option>
                            <option value="oldest" style="color: black;">Pesanan Terlama</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-filter ms-1" viewBox="0 0 16 16">
                            <path
                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg>
                    </div>
                </div>

                <div class="categories px-4 my-4">
                    <div class="hide-scrollbar d-flex w-100 px-lg-4"
                        style="margin-top: 0vh; overflow-x: auto; white-space: nowrap;">
                        <a href="#" class="btn me-2 active">
                            Semua
                        </a>
                        <a href="#" class="btn me-2">
                            Mangoes Retail
                        </a>
                        <a href="#" class="btn me-2">
                            SBS
                        </a>
                    </div>
                </div>

                <div class="nav-order-placeholder hide-scrollbar d-flex px-4 px-lg-5 mb-4"
                    style="overflow-x: auto; white-space: nowrap;">
                    <button class="btn-nav-order active">Semua</button>
                    <button class="btn-nav-order">Belum Dibayar</button>
                    <button class="btn-nav-order">Diproses</button>
                    <button class="btn-nav-order">Dikirim</button>
                    <button class="btn-nav-order">Selesai</button>
                </div>
                <div class="d-flex d-md-none row mx-4 mt-2">
                    <div class="card-pesanan col-12">
                        <button class="w-100" href="#"> <div class="d-flex flex-column row px-2">
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <img src="https://via.placeholder.com/300x150.png?text=Produk+A" alt="foto">
                                </div>
                                <div class="col-12 p-0 d-flex flex-column align-items-start">
                                    <div class="d-flex flex-column">
                                        <div class="text status gap-1 d-flex flex-row align-items-center justify-content-end"
                                            style="color: #FF601C"> <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill m-0" viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span class="status-nama">
                                                Menunggu Pembayaran
                                            </span>
                                        </div>
                                        <div class="text nama-produk text-start text-white">
                                            Nama Produk A (Contoh)
                                        </div>
                                    </div>
                                    <div class="text-start span-1" style="color: #9F9E9E">Pesanan dibuat tanggal
                                        18 Okt 2025
                                    </div>
                                    <div class="text-start span-1" style="color: #9F9E9E">
                                        ID Pesanan: ID-ABC111
                                    </div>
                                    <div class="payment-deadline-2">
                                        Pesanan otomatis dibatalkan pada tanggal
                                        20 Oktober 2025
                                    </div>
                                    <div
                                        class="w-100 d-flex flex-row mt-2 align-items-center mt-3 justify-content-between">
                                        <div class="text-white"
                                            style="font-size: 11px; font-family: Montserrat; font-weight: 500">
                                            Rp150.000
                                        </div>
                                        <a class="btn btn-bayar text-white"
                                            style="background-color: #3399FE; padding: 5px; border-radius: 6px; font-size: 10px;"
                                            href="#">
                                            Lanjutkan Pembayaran
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="d-flex d-md-none row mx-4 mt-2">
                    <div class="card-pesanan col-12">
                        <button class="w-100" href="#">
                            <div class="d-flex flex-column row px-2">
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <img src="https://via.placeholder.com/300x150.png?text=Produk+B" alt="foto">
                                </div>
                                <div class="col-12 p-0 d-flex flex-column align-items-start">
                                    <div class="d-flex flex-column">
                                        <div class="text status gap-1 d-flex flex-row align-items-center justify-content-end"
                                            style="color: #3399FE"> <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill m-0" viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span class="status-nama">
                                                Sedang Diproses
                                            </span>
                                        </div>
                                        <div class="text nama-produk text-start text-white">
                                            Nama Produk B (Contoh Lain)
                                        </div>
                                    </div>
                                    <div class="text-start span-1" style="color: #9F9E9E">Pesanan dibuat tanggal
                                        17 Okt 2025
                                    </div>
                                    <div class="text-start span-1" style="color: #9F9E9E">
                                        ID Pesanan: ID-DEF222
                                    </div>
                                    <div
                                        class="w-100 d-flex flex-row mt-2 align-items-center mt-3 justify-content-end">
                                        <a class="btn btn-bayar text-white"
                                            style="background-color: #3399FE; padding: 5px; border-radius: 6px; font-size: 10px;"
                                            href="#">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="d-flex d-md-none row mx-4 mt-2">
                    <div class="card-pesanan col-12">
                        <button class="w-100" href="#">
                            <div class="d-flex flex-column row px-2">
                                <div class="col-12 d-flex align-items-center mb-3">
                                    <img src="https://via.placeholder.com/300x150.png?text=Produk+C" alt="foto">
                                </div>
                                <div class="col-12 p-0 d-flex flex-column align-items-start">
                                    <div class="d-flex flex-column">
                                        <div class="text status gap-1 d-flex flex-row align-items-center justify-content-end"
                                            style="color: #8CC243"> <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill m-0" viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span class="status-nama">
                                                Selesai
                                            </span>
                                        </div>
                                        <div class="text nama-produk text-start text-white">
                                            Layanan Top Up (Selesai)
                                        </div>
                                    </div>
                                    <div class="text-start span-1" style="color: #9F9E9E">Pesanan dibuat tanggal
                                        16 Okt 2025
                                    </div>
                                    <div class="text-start span-1" style="color: #9F9E9E">
                                        ID Pesanan: ID-GHI333
                                    </div>
                                    <div
                                        class="w-100 d-flex flex-row mt-2 align-items-center mt-3 justify-content-end">
                                        <a class="btn btn-bayar text-white"
                                            style="background-color: #3399FE; padding: 5px; border-radius: 6px; font-size: 10px;"
                                            href="#">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="d-flex d-md-none justify-content-center align-items-center flex-column my-4"
                    style="text-align: center;">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>

                            <li class="page-item">
                                <a class="page-link page-number" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link page-number" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">5</a>
                            </li>

                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">10</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="mt-2 d-flex d-md-none">
                        <span class="text-white">Total Data: 20 dari 95</span>
                    </div>
                </div>
            </div>

            <div id="orders" class="w-90 mb-5 mx-auto d-none d-md-block">
                <div class="d-flex flex-wrap justify-content-between px-4">

                    <div class="order-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <button style="border: none; background-color: transparent" class="d-flex" href="#">
                                <div class="d-flex text-start align-items-center">
                                    <img src="https://via.placeholder.com/120x120.png?text=Produk+A" alt="foto">
                                    <div class="ms-3">
                                        <div class="text" style="color: #9F9E9E">ID Pesanan: ID-ABC111</div>
                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2 text-white">
                                            <span class="nama-produk-desktop">
                                                Nama Produk A (Desktop)
                                            </span>
                                        </div>
                                        <div class="text mb-2 status" style="color: #FF601C">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill me-1"
                                                viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span>
                                                Menunggu Pembayaran
                                            </span>
                                        </div>
                                        <div class="text" style="color: #9F9E9E">Pesanan dibuat tanggal
                                            18 Okt 2025
                                        </div>
                                        <div class="payment-deadline">
                                            Pesanan otomatis dibatalkan pada tanggal
                                            20 Oktober 2025
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <div
                                class="order-button d-flex flex-column justify-content-center align-items-center bg-transparent me-4">
                                <div class="text fw-bold mb-2 price text-white">
                                    Rp150.000
                                </div>
                                <button class="btn btn-bayar text-white"
                                    style="background-color: #3399FE; width: 15vw; padding: 12px; border-radius: 6px; font-size: 12px;">
                                    Lanjutkan Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="order-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <button style="border: none; background-color: transparent" class="d-flex" href="#">
                                <div class="d-flex text-start align-items-center">
                                    <img src="https://via.placeholder.com/120x120.png?text=Produk+B" alt="foto">
                                    <div class="ms-3">
                                        <div class="text" style="color: #9F9E9E">ID Pesanan: ID-DEF222</div>
                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2 text-white">
                                            <span class="nama-produk-desktop">
                                                Nama Produk B (Desktop)
                                            </span>
                                            <span style="font-size: 1rem; color: #9F9E9E;" class="ms-3">
                                                +2 Produk Lainnya
                                            </span>
                                        </div>
                                        <div class="text mb-2 status" style="color: #3399FE">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill me-1"
                                                viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span>
                                                Sedang Diproses
                                            </span>
                                        </div>
                                        <div class="text" style="color: #9F9E9E">Pesanan dibuat tanggal
                                            17 Okt 2025
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <div
                                class="order-button d-flex flex-column justify-content-center align-items-center bg-transparent me-4">
                                <button class="btn btn-bayar text-white"
                                    style="background-color: #3399FE; width: 15vw; padding: 12px; border-radius: 6px; font-size: 12px;">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="order-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <button style="border: none; background-color: transparent" class="d-flex" href="#">
                                <div class="d-flex text-start align-items-center">
                                    <img src="https://via.placeholder.com/120x120.png?text=Produk+C" alt="foto">
                                    <div class="ms-3">
                                        <div class="text" style="color: #9F9E9E">ID Pesanan: ID-GHI333</div>
                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2 text-white">
                                            <span class="nama-produk-desktop">
                                                Layanan Top Up (Selesai)
                                            </span>
                                        </div>
                                        <div class="text mb-2 status" style="color: #8CC243">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill me-1"
                                                viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span>
                                                Selesai
                                            </span>
                                        </div>
                                        <div class="text" style="color: #9F9E9E">Pesanan dibuat tanggal
                                            16 Okt 2025
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <div
                                class="order-button d-flex flex-column justify-content-center align-items-center bg-transparent me-4">
                                <button class="btn btn-bayar text-white"
                                    style="background-color: #3399FE; width: 15vw; padding: 12px; border-radius: 6px; font-size: 12px;">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="order-card p-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <button style="border: none; background-color: transparent" class="d-flex" href="#">
                                <div class="d-flex text-start align-items-center">
                                    <img src="https://via.placeholder.com/120x120.png?text=Produk+D" alt="foto">
                                    <div class="ms-3">
                                        <div class="text" style="color: #9F9E9E">ID Pesanan: ID-JKL444</div>
                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2 text-white">
                                            <span class="nama-produk-desktop">
                                                Produk Khusus (Desktop)
                                            </span>
                                        </div>
                                        <div class="text mb-2 status" style="color: #8158F4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="bi bi-circle-fill me-1"
                                                viewBox="0 0 16 16">
                                                <circle cx="6" cy="6" r="6" />
                                            </svg>
                                            <span>
                                                Menunggu Konfirmasi
                                            </span>
                                        </div>
                                        <div class="text" style="color: #9F9E9E">Pesanan dibuat tanggal
                                            15 Okt 2025
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <div
                                class="order-button d-flex flex-column justify-content-center align-items-center bg-transparent me-4">
                                <div class="text fw-bold mb-2 price text-white">
                                    Rp2.500.000
                                </div>
                                <button class="btn btn-bayar text-white"
                                    style="background-color: #263D51; width: 15vw; padding: 12px; border-radius: 6px; font-size: 12px;"
                                    disabled>
                                    Menunggu Konfirmasi
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center align-items-center flex-column mt-4"
                    style="text-align: center;">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>

                            <li class="page-item">
                                <a class="page-link page-number" href="#">1</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link page-number" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">5</a>
                            </li>

                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item">
                                <a class="page-link page-number" href="#">10</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="mt-2">
                        <span class="text-white">Total Data: 20 dari 95</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="ellipse-background-blue"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>