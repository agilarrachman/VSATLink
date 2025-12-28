@extends('layouts.app')

@section('title', 'Masuk | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax" style="padding: 150px 0">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />
            <div class="container z-1000">
                <div class="row align-items-center">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="padding40 rounded-10 bg-gray-900/40 backdrop-blur-md border !border-white/20">
                            <div class="text-center">
                                <h4>Masuk ke Akun Anda</h4>
                                <p>
                                    Login untuk berbelanja paket internet
                                    satelit terbaik dan kelola pesanan Anda
                                </p>
                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-3 text-left"
                                        role="alert">
                                        {{ session('loginError') }}
                                        <button type="button" class="btn-close custom-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <div class="spacer-10"></div>
                            <form id="form_register" class="form-border" method="post" action="/login">
                                @csrf
                                <div class="field-set">
                                    <label>Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="{{ old('username') }}" />
                                </div>
                                <div class="field-set">
                                    <label>Password</label>
                                    <div class="relative w-full">
                                        <input type="password" name="password" id="password"
                                            class="form-control w-full pr-12 @error('password') is-invalid @enderror" />

                                        <span class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer text-white"
                                            onclick="togglePassword()">
                                            <i id="eyeIcon" class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="field-set">
                                    <input class="form-check-input me-2" type="checkbox" value="" name="remember-me"
                                        id="remember-me">
                                    <label for="html">
                                        <span class="op-5">Ingat saya</span>
                                    </label>
                                    <br />
                                </div>
                                <div class="spacer-20"></div>
                                <div id="submit">
                                    <input type="submit" id="send_message" value="Sign In"
                                        class="btn-main btn-fullwidth rounded-3" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
