@extends('layouts.app')

@section('title', 'Masuk | VSATLink')

@section('content')
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    
    <section class="v-center jarallax" style="padding: 150px 0">
        <div class="de-gradient-edge-top"></div>
        <div class="de-gradient-edge-bottom"></div>
        <img src="images/background/jarralax.png" class="jarallax-img" alt="">
        <div class="container z-1000">
                <div class="row align-items-center">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="padding40 rounded-10 shadow-soft bg-dark-1">
                            <div class="text-center">
                                <h4>Masuk ke Akun Anda</h4>
                                <p>Login untuk berbelanja paket internet satelit terbaik dan kelola pesanan Anda</p>
                            </div>
                            <div class="spacer-10"></div>
                            <form id="form_register" class="form-border" method="post" action="index.html">
                                <div class="field-set">
                                    <label>Username</label>
                                    <input type='text' name='name' id='name' class="form-control">
                                </div>
                                <div class="field-set">
                                    <label>Password</label>
                                    <input type='text' name='password' id='password' class="form-control">
                                </div>
                                <div class="field-set">
                                    <input type="checkbox" checked id="html" name="fav_language" value="HTML">
                                    <label for="html"><span class="op-5">Ingat saya</span></label><br>
                                </div>
                                <div class="spacer-20"></div>
                                <div id="submit">
                                    <input type="submit" id="send_message" value="Sign In" class="btn-main btn-fullwidth rounded-3" />
                                </div>
                            </form>                                    
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection