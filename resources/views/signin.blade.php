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
    <link rel="stylesheet" href="css/signin-style.css">
</head>
<body>
    <div class="content d-flex flex-column align-items-center" style="padding-bottom: 150px">
        <div class="ellipse-background-purple"></div>

        <div class="container" style="margin-top:10rem !important;">
            <div class="row justify-content-center m-3" id="card">
                <div class="info col-lg-6 col-md-8 col-sm-12 col-12 p-5">
                    <img class="mt-3 mr-4 img-fluid" src="images/Logo VSATLink.png" alt="logo" style="max-width: 180px; max-height: 120px;">
                    <div class="app-behavior text-white mt-4 mb-3 fw-bold" style="font-size: 1.6rem !important;">Masuk ke Akun Anda</div>
                    <div class="d-flex justify-content-center flex-column">
                        <span class="text-light">Akses layanan dan kelola akun Anda dengan mudah. Masukkan email dan kata sandi untuk mulai menggunakan platform kami.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-12 col-12 p-0">
                    <div class="input-login py-2">
                        <form id="login-form" style="padding:0;" method="POST">
                            @csrf
                            <div class="app-behavior text-white mt-4 mb-3 fw-bold text-center" style="font-size: 1.6rem !important;">Masuk</div>
                            <div class="d-flex justify-content-center mx-4 flex-column">
                                <span class="text-light">Silakan masuk menggunakan akun yang sudah Anda daftarkan.</span>
                            </div>
                            <div class="d-flex justify-content-center mx-4 flex-column mb-3">
                                <div class="input-registration-regist py-2 px-3">
                                    <div class="app-behavior text-white placeholder-input">
                                        Username
                                    </div>
                                    <input type="text" class="login-input" id="username" name="username">
                                </div>
                                <div class="input-registration-regist d-flex flex-row py-2 px-3 align-items-center">
                                    <div style="width: 100%; display: flex; flex-direction: column; align-items: start;">
                                        <div class="app-behavior text-white placeholder-input">Password
                                        </div>
                                        <input type="password" class="bg-transparent border-0 text-white title m-0 input"
                                            name="password" id="password" style="flex: 1; width: 100%;">
                                    </div>
                                    <span class="input-group-text bg-transparent" style="color: white; margin-right:-10px;" id="showHide"></span>
                                </div>
                            </div>

                            <div class="d-flex justify-start mx-5">
                                <span class="error-message" style="color: red; font-size: 1rem; display: none;"
                                    id="error-message">Username atau Password salah!</span>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mt-3">
                                <button type="submit" class="btn btn-masuk text-center" style="border-radius: 15px; height: 3.5rem"
                                    id="btn-login">Masuk</button>
                            </div>
                            <div class="d-flex justify-content-end mx-4 mt-3" style="color: #3399FE">
                                <a href="{{ url('/password/reset') }}" class="text">Lupa Password?</a>
                            </div>
                            <div class="text-white mt-3 mx-4 mb-4 d-flex justify-content-center align-items-center">Belum punya akun? <a
                                    href="/register-company" style="color: #3399FE; text-decoration: underline; padding-left:5px;">Registrasi</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="ellipse-background-blue"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>