@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/logo-yapendik.png') }}" class="img-fluid rounded-start"
                            alt="..." style="max-width: 300px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Selamat Datang, {{ $profile->nama_sekolah }}</h2>
                            <p class="card-text">{{ $profile->alamat }}, {{ $profile->kode_pos }}</p>
                            <p class="card-text">Akreditasi : {{ $profile->akreditasi }}</p>
                        </div> <!-- end card-body -->
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-purple">
                <div class="card-body">
                    <div class="float-end">
                        <i class="ri-wallet-2-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Jumlah Pendaftar</h6>
                    <h2 class="my-2">{{ $count }}</h2>
                </div>
            </div>
        </div> <!-- end col-->
    </div>
    <div class="row">
        <ul class="list-group">
            <li class="list-group-item">1. Isi Biodata</li>
            <li class="list-group-item">2. Isi Data Orang Tua</li>
            <li class="list-group-item">3. Isi Data Pendukung</li>
            <li class="list-group-item">4. Setelah Semua Data Terisi Cetak Formulir Pendaftaran</li>
        </ul>
        <a href="{{ route('peserta.downloadSingle',['id' => Auth::user()->id]) }}" class="btn btn-sm btn-primary my-2" style="max-width: 200px">Download</a>
    </div>
@endsection
