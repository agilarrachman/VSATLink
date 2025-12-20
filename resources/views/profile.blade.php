@extends('layouts.app')

@section('title', 'Profil | VSATLink')

@section('content')
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <section class="v-center jarallax">
            <div class="de-gradient-edge-top"></div>
            <div class="de-gradient-edge-bottom"></div>
            <img src="images/background/jarralax.png" class="jarallax-img" alt="" />

            <div
                class="container flex flex-col shadow-lg/10 rounded-10 bg-gray-900/40 backdrop-blur-md border !border-white/20 !p-10 z-1000 mt-14 mb-auto">
                <h3 class="text-3xl text-center !mb-7">Profil</h3>

                <h4 class="!mb-3">Informasi Perusahaan</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="field-set">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="ptvsatlink" disabled />
                    </div>
                    <div class="field-set">
                        <label>Nama Perusahaan</label>
                        <input type="text" name="company_name" class="form-control" value="PT. VSATLink Indonesia"
                            disabled />
                    </div>
                    <div class="field-set">
                        <label>Nama Pejabat yang Berwenang</label>
                        <input type="text" name="company_name" class="form-control" value="Agil ArRachman" disabled />
                    </div>
                    <div class="field-set">
                        <label>Nomor NPWP Perusahaan</label>
                        <input type="text" name="npwp" class="form-control" value="01.000.013.1-093.000" disabled />
                    </div>
                    <div class="field-set">
                        <label>Email Perusahaan</label>
                        <input type="text" name="email" class="form-control" value="info@vsatlink.co.id" disabled />
                    </div>
                    <div class="field-set">
                        <label>Nomor Telepon Perusahaan</label>
                        <input type="text" name="phone" class="form-control" value="021-12345678" disabled />
                    </div>
                </div>

                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Alamat Perusahaan</h4>
                <div class="form-border mb-4 md:mb-6">
                    <div class="flex gap-3">
                        <div class="field-set w-1/2">
                            <label>Provinsi</label>
                            <select class="form-select" disabled>
                                <option selected>Pilih Provinsi</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="field-set w-1/2">
                            <label>Kota</label>
                            <select class="form-select" disabled>
                                <option selected>Pilih Kota</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="field-set w-1/2">
                            <label>Kecamatan</label>
                            <select class="form-select" disabled>
                                <option selected>Pilih Kecamatan</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="field-set w-1/2">
                            <label>Kelurahan</label>
                            <select class="form-select" disabled>
                                <option selected>Pilih Kelurahan</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="field-set w-1/3">
                            <label>RT</label>
                            <input type="number" name="rt" id="rt" class="form-control" value="1"
                                disabled />
                        </div>
                        <div class="field-set w-1/3">
                            <label>RW</label>
                            <input type="number" name="rw" id="rw" class="form-control" value="3"
                                disabled />
                        </div>
                        <div class="field-set w-1/3">
                            <label>Kode Pos</label>
                            <input type="number" name="post-code" id="post-code" class="form-control" value="12345"
                                disabled />
                        </div>
                    </div>
                    <div class="field-set">
                        <label>Alamat Lengkap</label>
                        <textarea name="address" id="address" class="form-control !min-h-[160px]">Jalan Sudirman No 19</textarea>
                    </div>
                </div>

                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Narahubung Perusahaan</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="field-set">
                        <label>Nama Narahubung</label>
                        <input type="text" name="contact_name" class="form-control" value="Budi Santoso" disabled />
                    </div>
                    <div class="field-set">
                        <label>Nomor Telepon Narahubung</label>
                        <input type="text" name="contact_phone" class="form-control" value="081234567890" disabled />
                    </div>
                    <div class="field-set">
                        <label>Email Narahubung</label>
                        <input type="text" name="contact_email" class="form-control"
                            value="budi.santoso@vsatlink.co.id" disabled />
                    </div>
                    <div class="field-set">
                        <label>Jabatan Narahubung</label>
                        <input type="text" name="contact_potition" class="form-control" value="Head of Finance"
                            disabled />
                    </div>
                </div>

                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Dokumen Legalitas Perusahaan</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                    <div class="field-set flex flex-col items-start">
                        <label class="mb-2 font-medium">NPWP</label>
                        <a href="{{ asset('docs/npwp.pdf') }}" target="_blank"
                            class="btn-main">
                            Lihat PDF
                        </a>
                    </div>

                    <div class="field-set flex flex-col items-start">
                        <label class="mb-2 font-medium">NIB</label>
                        <a href="{{ asset('docs/nib.pdf') }}" target="_blank"
                            class="btn-main">
                            Lihat PDF
                        </a>
                    </div>

                    <div class="field-set flex flex-col items-start">
                        <label class="mb-2 font-medium">SK Kemenkumham Akta Pendirian</label>
                        <a href="{{ asset('docs/sk.pdf') }}" target="_blank"
                            class="btn-main">
                            Lihat PDF
                        </a>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
