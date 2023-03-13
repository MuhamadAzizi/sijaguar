@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid">

    @if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="card mx-3 mb-4 py-4 px-3 bg-gradient-success text-white text-sm d-flex">
                <div class="text-white me-2 d-flex align-items-center">
                    <i class="material-icons opacity-10">check_circle</i>
                    <span class="nav-link-text ms-1">
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-info opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="" alt="profile_image" class="w-100 h-100 border-radius-lg shadow-sm"
                        style="object-fit: cover;">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ $user->nama }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{ $user->level }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Profil</h6>
                    </div>
                    <div class="card-body p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Detail Akun</h6>
                        <div>
                            <div class="input-group input-group-static my-3">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}"
                                    readonly>
                            </div>
                            <div class="input-group input-group-static my-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->level == 'Admin')
        <div class="row">
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">History Pengajuan Penggunaan Ruangan
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <table id="tabel-penggunaan" class="table table-responsive w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                            User</th>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Ruangan</th>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Tanggal Pinjam</th>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Jam Masuk</th>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Jam Keluar</th>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Keterangan</th>
                                        <th
                                            class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penggunaan as $row)
                                    <tr>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-sm ps-3">
                                                {{ $row->user->username }}
                                            </h6>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->ruangan->no_ruangan }} -
                                                {{ $row->ruangan->jenisRuangan->nama_jenis_ruangan }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->tanggal_penggunaan }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->jam_masuk }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->jam_keluar }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->keterangan }}
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            @if ($row->status == 'Menunggu')
                                            <p class="text-xs text-warning font-weight-bold mb-0">
                                                {{ $row->status }}
                                            </p>
                                            @elseif ($row->status == 'Diterima')
                                            <p class="text-xs text-success font-weight-bold mb-0">
                                                {{ $row->status }}
                                            </p>
                                            @elseif ($row->status == 'Ditolak')
                                            <p class="text-xs text-danger font-weight-bold mb-0">
                                                {{ $row->status }}
                                            </p>
                                            @elseif ($row->status == 'Selesai')
                                            <p class="text-xs text-secondary font-weight-bold mb-0">
                                                {{ $row->status }}
                                            </p>
                                            @endif
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
        @endif
    </div>
</div>
@endsection

@section('datatable-script')
<script>
    $(document).ready(function() {
        $('#tabel-penggunaan').DataTable({
            responsive: true
        });
    });
</script>
@endsection