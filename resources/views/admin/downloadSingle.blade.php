<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard {{ Auth::user()->role }} || PPDB Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="PPDB berbasi web SEKOLAH DASAR" name="description" />
    <meta content="Smtechnology.id" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-landing/images/SI PRAKTIF (1).png') }}" type="image/x-icon">


    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/css/jquery.dataTables.min.css">

    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
</head>


<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <div class="app-search d-none d-lg-block">

                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">




                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image"
                                    width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">{{ Auth::user()->name }} <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->


        <div class="leftside-menu">

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Sistem PPDB Online</li>


                    @if (Auth::user()->role == 'admin')
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                                <i class="ri-home-3-line"></i>
                                <span> Dashboard </span>
                            </a>
                            <li class="side-nav-item">
                                <a href="{{ route('admin.profileSekolah') }}" class="side-nav-link">
                                    <i class=" ri-building-fill"></i>
                                    <span> Profile Sekolah </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('admin.dataPeserta') }}" class="side-nav-link">
                                    <i class="ri-parent-fill"></i>
                                    <span> Data Peserta </span>
                                </a>
                            </li>
                        </li>
                    @elseif (Auth::user()->role == 'pimpinan')
                        <li class="side-nav-item">
                            <a href="{{ route('pimpinan.dashboard') }}" class="side-nav-link">
                                <i class="ri-home-3-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('pimpinan.dataPeserta') }}" class="side-nav-link">
                                <i class="ri-parent-fill"></i>
                                <span> Data Peserta </span>
                            </a>
                        </li>
                    @elseif (Auth::user()->role == 'peserta')
                        <li class="side-nav-item">
                            <a href="{{ route('peserta.dashboard') }}" class="side-nav-link">
                                <i class="ri-home-3-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('peserta.dataPribadi') }}" class="side-nav-link">
                                <i class="ri-contacts-fill"></i>
                                <span> Data Pribadi </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('peserta.dataPendukung') }}" class="side-nav-link">
                                <i class="ri-download-2-line"></i>
                                <span> Data Pendukung </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('peserta.dataOrangTua') }}" class="side-nav-link">
                                <i class="ri-parent-fill"></i>
                                <span> Data Pendukung </span>
                            </a>
                        </li>
                    @endif
                    <li class="side-nav-item">
                        <a href="{{ route('logout') }}" class="side-nav-link">
                            <i class="ri-logout-box-line"></i>
                            <span> Logout </span>
                        </a>
                    </li>
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="row">
                <h3 class="text-center">Data Peserta Pendaftaran Siswa Baru</h3>
                <p class="text-center">Nama Akun : {{ $data->name }}</p>
                <p class="text-center"> Email Akun : {{ $data->email }}</p>
                
                <hr>
                <div class="d-print-none mt-4">
                    <div class="text-center">
                        <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-printer-line"></i>
                            Print</a>
                        <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <form action="{{ route('peserta.updateDataPribadi') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Lengkap <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                        value="{{ $data->dataPribadi->nama_lengkap ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->nama_lengkap)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                                        value="{{ $data->dataPribadi->jenis_kelamin ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->jenis_kelamin)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor KK <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="no_kk" id="no_kk"
                                        value="{{ $data->dataPribadi->no_kk ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->no_kk)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        value="{{ $data->dataPribadi->tempat_lahir ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->tempat_lahir)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ $data->dataPribadi->tanggal_lahir ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->tanggal_lahir)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="agama" id="agama"
                                        value="{{ $data->dataPribadi->agama ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->agama)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                                        value="{{ $data->dataPribadi->kewarganegaraan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->kewarganegaraan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus" id="berkebutuhan_khusus"
                                        value="{{ $data->dataPribadi->berkebutuhan_khusus ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->berkebutuhan_khusus)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <textarea name="alamat" id="alamat" required
                                        class="form-control @if (empty($data->dataPribadi->alamat)) text-danger @endif" readonly>{{ $data->dataPribadi->alamat ?? 'data belum diisi' }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>RT <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="rt" id="rt"
                                        value="{{ $data->dataPribadi->rt ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->rt)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>RW <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="rw" id="rw"
                                        value="{{ $data->dataPribadi->rw ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->rw)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Dusun</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="dusun" id="dusun"
                                        value="{{ $data->dataPribadi->dusun ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->dusun)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Kelurahan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="kelurahan" id="kelurahan"
                                        value="{{ $data->dataPribadi->kelurahan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->kelurahan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Kecamatan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="kecamatan" id="kecamatan"
                                        value="{{ $data->dataPribadi->kecamatan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->kecamatan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Kode Pos <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="kode_pos" id="kode_pos"
                                        value="{{ $data->dataPribadi->kode_pos ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->kode_pos)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Tinggal <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_tinggal" id="tempat_tinggal"
                                        value="{{ $data->dataPribadi->tempat_tinggal ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->tempat_tinggal)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Mode Transportasi <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="mode_transportasi" id="mode_transportasi"
                                        value="{{ $data->dataPribadi->mode_transportasi ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->mode_transportasi)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Anak Ke <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="anak_ke" id="anak_ke"
                                        value="{{ $data->dataPribadi->anak_ke ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPribadi->anak_ke)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h3>Data Pendukung</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>Tinggi Badan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="tinggi_badan" id="tinggi_badan"
                                        value="{{ $data->dataPendukung->tinggi_badan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->tinggi_badan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Berat Badan <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="berat_badan" id="berat_badan"
                                        value="{{ $data->dataPendukung->berat_badan ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->berat_badan)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Lingkar Kepala</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="lingkar_kepala" id="lingkar_kepala"
                                        value="{{ $data->dataPendukung->lingkar_kepala ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->lingkar_kepala)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak Tempuh</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="jarak_tempuh" id="jarak_tempuh"
                                        value="{{ $data->dataPendukung->jarak_tempuh ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->jarak_tempuh)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Waktu Tempuh</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="waktu_tempuh" id="waktu_tempuh"
                                        value="{{ $data->dataPendukung->waktu_tempuh ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->waktu_tempuh)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah Saudara</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="jumlah_saudara" id="jumlah_saudara"
                                        value="{{ $data->dataPendukung->jumlah_saudara ?? 'data belum diisi' }}"
                                        class="form-control @if (empty($data->dataPendukung->jumlah_saudara)) text-danger @endif"
                                        readonly>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><h3>Data Orang Tua</h3></td>
                            </tr>
                            <tr>
                                <td>Nama Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_ayah" id="nama_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nama_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nama_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="nik_ayah" id="nik_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nik_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nik_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tempat_lahir_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tempat_lahir_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tanggal_lahir_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tanggal_lahir_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="pendidikan_ayah" id="pendidikan_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->pendidikan_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->pendidikan_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ayah <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="penghasilan_ayah" id="penghasilan_ayah" required class="form-control" 
                                           value="{{ $data->dataOrangTua->penghasilan_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->penghasilan_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus Ayah</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" class="form-control" 
                                           value="{{ $data->dataOrangTua->berkebutuhan_khusus_ayah ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->berkebutuhan_khusus_ayah)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_ibu" id="nama_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nama_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nama_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="nik_ibu" id="nik_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->nik_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->nik_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tempat_lahir_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tempat_lahir_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="date" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->tanggal_lahir_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->tanggal_lahir_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="pendidikan_ibu" id="pendidikan_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->pendidikan_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->pendidikan_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Ibu <span class="text-danger">*</span></td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="penghasilan_ibu" id="penghasilan_ibu" required class="form-control" 
                                           value="{{ $data->dataOrangTua->penghasilan_ibu ?? 'data belum diisi' }}" 
                                           @if (empty($data->dataOrangTua->penghasilan_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus Ibu</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" class="form-control" 
                                           value="{{ $data->dataOrangTua->berkebutuhan_khusus_ibu ?? '' }}" 
                                           @if (empty($data->dataOrangTua->berkebutuhan_khusus_ibu)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="nama_wali" id="nama_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->nama_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->nama_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>NIK Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="nik_wali" id="nik_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->nik_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->nik_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tempat_lahir_wali" id="tempat_lahir_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->tempat_lahir_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->tempat_lahir_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="tanggal_lahir_wali" id="tanggal_lahir_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->tanggal_lahir_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->tanggal_lahir_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="pendidikan_wali" id="pendidikan_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->pendidikan_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->pendidikan_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Penghasilan Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="number" name="penghasilan_wali" id="penghasilan_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->penghasilan_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->penghasilan_wali)) readonly @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>Berkebutuhan Khusus Wali</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="berkebutuhan_khusus_wali" id="berkebutuhan_khusus_wali" class="form-control" 
                                           value="{{ $data->dataOrangTua->berkebutuhan_khusus_wali ?? '' }}" 
                                           @if (empty($data->dataOrangTua->berkebutuhan_khusus_wali)) readonly @endif>
                                </td>
                            </tr>
                        </table>
                    </form>


                </div>
            </div>
           
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velonic - Theme by <b>Techzaa</b>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
            <h5 class="text-white m-0">Theme Settings</h5>
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-3">
                    <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme"
                                    id="layout-color-light" value="light">
                                <label class="form-check-label" for="layout-color-light">
                                    <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-bs-theme"
                                    id="layout-color-dark" value="dark">
                                <label class="form-check-label" for="layout-color-dark">
                                    <img src="assets/images/layouts/dark.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                        id="layout-mode-fluid" value="fluid">
                                    <label class="form-check-label" for="layout-mode-fluid">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                            </div>

                            <div class="col-4">
                                <div id="layout-boxed">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                            id="layout-mode-boxed" value="boxed">
                                        <label class="form-check-label" for="layout-mode-boxed">
                                            <img src="assets/images/layouts/boxed.png" alt=""
                                                class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-light" value="light">
                                <label class="form-check-label" for="topbar-color-light">
                                    <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check form-switch card-switch mb-1">
                                <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-dark" value="dark">
                                <label class="form-check-label" for="topbar-color-dark">
                                    <img src="assets/images/layouts/topbar-dark.png" alt=""
                                        class="img-fluid">
                                </label>
                            </div>
                            <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                        </div>
                    </div>

                    <div>
                        <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color"
                                        id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        <img src="assets/images/layouts/sidebar-light.png" alt=""
                                            class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-menu-color"
                                        id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-compact" value="compact">
                                    <label class="form-check-label" for="leftbar-size-compact">
                                        <img src="assets/images/layouts/compact.png" alt=""
                                            class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        <img src="assets/images/layouts/sm.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                            </div>


                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                        id="leftbar-size-full" value="full">
                                    <label class="form-check-label" for="leftbar-size-full">
                                        <img src="assets/images/layouts/full.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-position">
                        <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                        <div class="btn-group checkbox" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-fixed" value="fixed">
                            <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-soft-primary w-sm ms-0"
                                for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velonic" target="_blank" role="button"
                        class="btn btn-primary w-100">Buy Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
