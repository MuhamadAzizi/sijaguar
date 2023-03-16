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
        SIJAGUAR - Sistem Informasi Jadwal Penggunaan Ruangan
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

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid text-center">
                        <span class="navbar-brand font-weight-bolder w-100">
                            Sistem Informasi Jadwal Penggunaan Ruangan (SIJAGUAR)
                        </span>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0 pb-3">Sign Up</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger text-white" role="alert">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                        <li><small>{{ $error }}</small></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if (session('error'))
                                <div class="alert alert-danger text-white" role="alert">
                                    <small>{{ session('error') }}</small>
                                </div>
                                @endif

                                <form role="form" class="text-start" action="{{ route('register.store') }}"
                                    method="post">
                                    @csrf
                                    <div
                                        class="input-group input-group-outline my-3 @error('nama') is-invalid is-filled @enderror {{ old('nama') ? 'is-valid is-filled' : '' }}">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                                    </div>
                                    <div
                                        class="input-group input-group-outline my-3 @error('username') is-invalid is-filled @enderror {{ old('username') ? 'is-valid is-filled' : '' }}">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username"
                                            value="{{ old('username') }}">
                                    </div>
                                    <div
                                        class="input-group input-group-outline mb-3 @error('password') is-invalid is-filled @enderror">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div
                                        class="input-group input-group-outline mb-3 @error('password') is-invalid is-filled @enderror">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign
                                            Up</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Sudah mempunyai akun?
                                        <a href="{{ route('login.index') }}"
                                            class="text-info text-gradient font-weight-bold">Login</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white">
                                © Sistem Informasi Jadwal Penggunaan Ruangan 2023
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
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