<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>
        SIJAGUAR - @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.0.4') }}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/ju/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.css" />
</head>

<body class="g-sidenav-show  bg-gray-200">

    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('index') }}">
                <!-- <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
                <span class="ms-1 font-weight-bold text-white">Sistem Informasi</span> <br />
                <span class="ms-1 font-weight-bold text-white">Jadwal Penggunaan Ruangan</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('/') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('penggunaan*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('penggunaan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Penggunaan</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Ruangan
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('ruangan*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('ruangan.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">meeting_room</i>
                        </div>
                        <span class="nav-link-text ms-1">Daftar Ruangan</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Perkuliahan
                    </h6>
                </li>

                @if (Auth::user()->level == 'Admin')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('mata-kuliah*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('mata-kuliah.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">list_alt</i>
                        </div>
                        <span class="nav-link-text ms-1">Mata Kuliah</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('jadwal*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('jadwal.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">calendar_month</i>
                        </div>
                        <span class="nav-link-text ms-1">Jadwal</span>
                    </a>
                </li>

                @if (Auth::user()->level == 'Admin')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('verifikasi-jadwal*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('verifikasi-jadwal.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">check</i>
                        </div>
                        <span class="nav-link-text ms-1">Verifikasi Jadwal</span>
                    </a>
                </li>
                @endif

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">User
                    </h6>
                </li>

                @if (Auth::user()->level == 'Admin')
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('dosen*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('dosen.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Dosen</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('user*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('user.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Daftar User</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('profil*') ? 'active bg-gradient-info' : '' }}"
                        href="{{ route('profil.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-danger mt-4 w-100" href="{{ route('login.logout') }}" type="button">Logout</a>
            </div>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        @foreach (Breadcrumbs::generate(Request::route()->getName()) as $breadcrumb)
                        @if (!is_null($breadcrumb->url) && !$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                        <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                        @endif
                        @endforeach
                    </ol>
                    <h6 class="font-weight-bolder mb-0">
                        {{ $title }}
                    </h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav ms-auto justify-content-end">
                        <li class="nav-item px-3 d-flex align-items-center">
                            <div class="d-flex flex-column align-items-end">
                                <span id="current_date" class="text-sm"></span>
                                <span id="clock" class="text-sm fw-bold"></span>
                            </div>
                        </li>
                        <li class="nav-item ps-3 d-xl-none d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        @yield('content')

        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © Sistem Informasi Jadwal Penggunaan Ruangan 2022
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </main>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js">
    </script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true
            });
        });
    </script>
    <!--Modal JS Script -->

    <script>
        var current_date = document.getElementById('current_date')
        var clock = document.getElementById('clock')

        function time() {

            var d = new Date()
            var d_list = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
            var d_indo = d_list[d.getDay()]
            // var date = d.getFullYear() + "-" + ("0" + (d.getMonth() + 1)).substr(-2) + "-" + ("0" +
            //     d.getDate()).substr(-2)
            var date = ("0" + d.getDate()).substr(-2) + "/" + ("0" + (d.getMonth() + 1)).substr(-2) +
                "/" + d.getFullYear()
            var s = d.getSeconds()
            var m = d.getMinutes()
            var h = d.getHours()

            current_date.textContent = d_indo + ", " + date
            clock.textContent =
                ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2)
        }

        setInterval(time, 1000)
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-dashboard.min.js?v=3.0.4') }}"></script>
</body>

</html>