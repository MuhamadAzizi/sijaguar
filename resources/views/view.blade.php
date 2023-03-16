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

    <style>
        table.dataTable.no-footer {
            border-bottom: 0 !important;
        }

        .table> :not(caption)>*>* {
            border: 0 !important;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="text-center mb-2">
                <img src="{{ asset('img/Logo Unsera.png') }}" alt="logo unsera" height="125" />
            </div>
            <div class="row mb-4">
                <h3 class="font-weight-bolder mb-0 text-center">
                    JADWAL PENGGUNAAN RUANGAN
                </h3>
                <h5 class="text-center font-weight-normal">
                    @if (date('l') == 'Sunday')
                    == Minggu, {{ date('d-m-Y') }} ==
                    @elseif (date('l') == 'Monday')
                    == Senin, {{ date('d-m-Y') }} ==
                    @elseif (date('l') == 'Tuesday')
                    == Selasa, {{ date('d-m-Y') }} ==
                    @elseif (date('l') == 'Wednesday')
                    == Rabu, {{ date('d-m-Y') }} ==
                    @elseif (date('l') == 'Thursday')
                    == Kamis, {{ date('d-m-Y') }} ==
                    @elseif (date('l') == 'Friday')
                    == Jumat, {{ date('d-m-Y') }} ==
                    @elseif (date('l') == 'Saturday')
                    == Sabtu, {{ date('d-m-Y') }} ==
                    @endif
                </h5>
            </div>
            <div class="row">
                <div class="col-lg-8 mb-3">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="mb-0">Jadwal Perkuliahan</h5>
                                    <h6 class="font-weight-normal mb-0">
                                        {{ $sesi }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 overflow-auto border-top w-100">
                            <div class="row">
                                <div class="col-12 overflow-auto">
                                    <table id="tabel-jadwal" class="table table-responsive align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                                    Ruang</th>
                                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                                    Waktu</th>
                                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                                    Kelas</th>
                                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                                    Nama Mata Kuliah</th>
                                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                                    Dosen</th>
                                                <th class="text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                                    Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($verifikasi_jadwal as $row)
                                            <tr class="border-0">
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $row->jadwal->ruangan->no_ruangan }}
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
                                                        {{ $row->jadwal->kelas }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $row->jadwal->mataKuliah->nama_mk }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $row->jadwal->dosen->nama_dosen }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="align-middle {{ ($row->status == 'Hadir') ? 'bg-success text-white' : (($row->status == 'Tidak Hadir') ? 'bg-danger text-white' : (($row->status == 'Menunggu') ? 'bg-warning text-white' : '')) }}">
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $row->status }}
                                                    </p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Penggunaan Ruangan Tambahan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 border-top overflow-auto">
                            <table id="tabel-ruangan-tambahan" class="table table-responsive w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-dark text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Ruangan</th>
                                        <th class="text-dark text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Waktu</th>
                                        <th class="text-dark text-uppercase text-dark text-xs font-weight-bolder ps-2">
                                            Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penggunaan as $row)
                                    <tr>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->ruangan->no_ruangan }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->jam_masuk }} - {{ $row->jam_keluar }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $row->keterangan }}
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer py-4 ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted w-100">
                            © Sistem Informasi Jadwal Penggunaan Ruangan 2023
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
            $('#tabel-jadwal').DataTable({
                bFilter: false,
                bInfo: false,
                paging: false,
                order: [
                    [1, 'asc']
                ]
            });

            $('#tabel-ruangan-tambahan').DataTable({
                bFilter: false,
                bInfo: false,
                paging: false,
                order: [
                    [1, 'asc']
                ]
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