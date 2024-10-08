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


                    @if (Auth::user()->role == 'peserta')
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i style="font-size: 26px;" class=" ri-notification-3-line"></i>
                            <span class="badge bg-danger rounded-circle"><span class="badge bg-danger rounded-circle">{{ $announcementCount }}</span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated">
                            @foreach ($announcements as $announcement)
                                <a href="{{ route('peserta.detailPengumuman', ['id' => $announcement->id]) }}" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> {{ $announcement->judul }}
                                </a>
                            @endforeach
                            </div>
                        </li>
                    @endif
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


        <!-- ========== Left Sidebar Start ========== -->
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
                                <a href="{{ route('admin.payment') }}" class="side-nav-link">
                                    <i class="ri-money-dollar-circle-fill"></i>
                                    <span> Pembayaran </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('admin.dataPeserta') }}" class="side-nav-link">
                                    <i class="ri-parent-fill"></i>
                                    <span> Data Peserta </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('admin.pengumuman') }}" class="side-nav-link">
                                    <i class="ri-parent-fill"></i>
                                    <span> Pengumuman </span>
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
                        <li class="side-nav-item">
                            <a href="{{ route('pimpinan.payment') }}" class="side-nav-link">
                                <i class="ri-money-dollar-circle-fill"></i>
                                <span> Rekap Pembayaran </span>
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
                            <a href="{{ route('peserta.paymentPeserta') }}" class="side-nav-link">
                                <i class="ri-money-dollar-circle-fill"></i>
                                <span> Pembayaran </span>
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
                                <span> Data Orang Tua </span>
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
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="container-fluid mt-3">
                                    <div class="card">
                                        <div class="card-body py-2">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> YAYASAN PENDIDIKAN KRISTEN GPIB "BETLEHEM" SUNGAI AMBAWANG</b>
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
    @yield('scripts')
    <script>
        CKEDITOR.replace('content_berita');
    </script>

    <!-- END wrapper -->
    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>

    <script>
        $('table').dataTable();
    </script>
</body>

</html>