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
    <meta http-equiv="refresh" content="30">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>
        SIJAGUAR - {{ $title }}
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

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <h6 class="font-weight-bolder mb-0">
                        {{ $title }} {{ $sesi }}
                    </h6>

                    @if (!Auth::check())
                    <a href="{{ route('login.index') }}" class="btn btn-info btn-sm ms-3 m-0">Login</a>
                    @endif
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

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8 mb-3">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Perkuliahan Hari Ini</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 border-top">
                            <table class="table table-responsive w-100 align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Nama Mata Kuliah</th>
                                        <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Dosen</th>
                                        <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Kelas</th>
                                        <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Waktu</th>
                                        <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Ruang</th>
                                        <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($verifikasi_jadwal as $row)
                                    <tr>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jadwal->mataKuliah->nama_mk }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jadwal->mataKuliah->dosen->nama_dosen }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jadwal->kelas }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jadwal->jam_mulai }}
                                                -
                                                {{ $row->jadwal->jam_selesai }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jadwal->ruangan->no_ruangan }}
                                            </p>
                                        </td>
                                        <td
                                            class="align-middle {{ ($row->status == 'Hadir') ? 'bg-success text-white' : (($row->status == 'Tidak Hadir') ? 'bg-danger text-white' : (($row->status == 'Menunggu') ? 'bg-warning text-white' : '')) }}">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->status }}
                                            </p>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                Tidak ada data
                                            </p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Jadwal Penggunaan Ruangan Hari Ini</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 border-top">
                            <table class="table table-responsive w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-dark text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Ruangan</th>
                                        <th class="text-dark text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Waktu</th>
                                        <th class="text-dark text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penggunaan as $row)
                                    <tr>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->ruangan->no_ruangan }} - {{
                                                $row->ruangan->jenisRuangan->nama_jenis_ruangan }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jam_masuk }} - {{ $row->jam_keluar }}
                                            </p>
                                        </td>
                                        <td
                                            class="align-middle {{ ($row->status == 'Diterima') ? 'bg-success text-white' : (($row->status == 'Ditolak') ? 'bg-danger text-white' : (($row->status == 'Menunggu') ? 'bg-warning text-white' : (($row->status == 'Selesai') ? 'bg-secondary text-white' : ''))) }}">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->status }}
                                            </p>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <p class="text-sm font-weight-bold mb-0">
                                                Tidak ada data
                                            </p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start w-100">
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
                responsive: true,
                order: [],
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