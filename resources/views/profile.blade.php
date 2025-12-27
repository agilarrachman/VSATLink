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

                <h4 class="!mb-3">Informasi {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : 'Saya' }}</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="field-set">
                        <label>Jenis Customer</label>
                        <input type="text" name="customer_type" class="form-control" value="{{ $user->customer_type }}"
                            disabled />
                    </div>
                    <div class="field-set">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled />
                    </div>
                    <div class="field-set">
                        <label>Nama {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : 'Lengkap' }}</label>
                        <input type="text" name="company_name" class="form-control" value="{{ $user->name }}"
                            disabled />
                    </div>
                    @if ($user->customer_type != 'Perorangan')
                    <div class="field-set">
                        <label>Nama Pejabat yang Berwenang</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ $user->company_representative_name }}" disabled />
                    </div>
                    @endif
                    <div class="field-set">
                        <label>Nomor NPWP {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : '' }}</label>
                        <input type="text" name="npwp" class="form-control" value="{{ $user->npwp }}" disabled />
                    </div>
                    <div class="field-set">
                        <label>Email {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : '' }}</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled />
                    </div>
                    <div class="field-set {{ $user->customer_type != 'Perorangan' ? 'mb-3' : '' }}">
                        <label>Nomor Telepon {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : '' }}</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" disabled />
                    </div>
                </div>

                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Informasi Akun</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="field-set">
                        <label>Sales Pendamping</label>
                        <input type="text" name="am_name" class="form-control" value="{{ $user->sales->name }}"
                            disabled />
                    </div>
                    <div class="field-set">
                        <label>Sumber Informasi</label>
                        <input type="text" name="source_information" class="form-control"
                            value="{{ $user->source_information }}" disabled />
                    </div>
                </div>

                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Alamat {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : 'Saya' }}</h4>
                <div class="form-border mb-4 md:mb-6">
                    <div class="flex gap-3">
                        <div class="field-set w-1/2">
                            <label>Provinsi</label>
                            <input type="text" name="province" class="form-control"
                                value="{{ $provinces->firstWhere('code', $user->province_code)->name ?? 'Tidak Ditemukan' }}"
                                disabled />
                        </div>
                        <div class="field-set w-1/2">
                            <label>Kota</label>
                            <input type="text" name="province" class="form-control"
                                value="{{ $cities->firstWhere('code', $user->city_code)->name ?? 'Tidak Ditemukan' }}"
                                disabled />
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="field-set w-1/2">
                            <label>Kecamatan</label>
                            <input type="text" name="district" class="form-control"
                                value="{{ $districts->firstWhere('code', $user->district_code)->name ?? 'Tidak Ditemukan' }}"
                                disabled />
                        </div>
                        <div class="field-set w-1/2">
                            <label>Kelurahan</label>
                            <input type="text" name="village" class="form-control"
                                value="{{ $villages->firstWhere('code', $user->village_code)->name ?? 'Tidak Ditemukan' }}"
                                disabled />
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="field-set w-1/3">
                            <label>RT</label>
                            <input type="number" name="rt" id="rt" class="form-control"
                                value="{{ $user->rt }}" disabled />
                        </div>
                        <div class="field-set w-1/3">
                            <label>RW</label>
                            <input type="number" name="rw" id="rw" class="form-control"
                                value="{{ $user->rw }}" disabled />
                        </div>
                        <div class="field-set w-1/3">
                            <label>Kode Pos</label>
                            <input type="number" name="post-code" id="post-code" class="form-control"
                                value="{{ $user->postal_code }}" disabled />
                        </div>
                    </div>
                    <div class="field-set">
                        <label>Alamat Lengkap</label>
                        <textarea name="address" id="address" class="form-control !min-h-[160px]">{{ $user->full_address }}</textarea>
                    </div>
                </div>

                @if ($user->customer_type != 'Perorangan')
                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Narahubung Perusahaan</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div class="field-set">
                        <label>Nama Narahubung</label>
                        <input type="text" name="contact_name" class="form-control"
                            value="{{ $user->contact_name }}" disabled />
                    </div>
                    <div class="field-set">
                        <label>Nomor Telepon Narahubung</label>
                        <input type="text" name="contact_phone" class="form-control"
                            value="{{ $user->contact_phone }}" disabled />
                    </div>
                    <div class="field-set">
                        <label>Email Narahubung</label>
                        <input type="text" name="contact_email" class="form-control"
                            value="{{ $user->contact_email }}" disabled />
                    </div>
                    <div class="field-set">
                        <label>Jabatan Narahubung</label>
                        <input type="text" name="contact_potition" class="form-control"
                            value="{{ $user->contact_position }}" disabled />
                    </div>
                </div>
                @endif

                <hr class="w-full !mt-0 !mb-6 border-t border-white/40">

                <h4 class="!mb-3">Dokumen Legalitas {{ $user->customer_type != 'Perorangan' ? 'Perusahaan' : 'Saya' }}</h4>
                <div class="form-border !h-fit grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                    <div class="field-set flex flex-col items-start">
                        <label class="mb-2 font-medium">NPWP</label>
                        <a href="{{ asset('storage/' . $user->npwp_document_url) }}" target="_blank" class="btn-main">
                            Lihat PDF
                        </a>
                    </div>

                    @if ($user->customer_type != 'Perorangan')
                    <div class="field-set flex flex-col items-start">
                        <label class="mb-2 font-medium">NIB</label>
                        <a href="{{ asset('storage/' . $user->nib_document_url) }}" target="_blank" class="btn-main">
                            Lihat PDF
                        </a>
                    </div>

                    <div class="field-set flex flex-col items-start">
                        <label class="mb-2 font-medium">SK Kemenkumham Akta Pendirian</label>
                        <a href="{{ asset('storage/' . $user->sk_document_url) }}" target="_blank" class="btn-main">
                            Lihat PDF
                        </a>
                    </div>
                    @endif
                </div>

            </div>

        </section>
    </div>
@endsection
