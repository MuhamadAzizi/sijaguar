@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <div class="row mx-3">
        <small>Selamat datang kembali <strong>{{ Auth::user()->nama }}</strong>, </small>
        <h5>di Sistem Informasi Pengelolaan Ruangan</h5>
    </div>
    <div class="row py-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">meeting_room</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Penggunaan Menunggu</p>
                        <h4 class="mb-0">
                            {{ $count_penggunaan_menunggu }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">meeting_room</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Penggunaan Diterima</p>
                        <h4 class="mb-0">
                            {{ $count_penggunaan_diterima }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">meeting_room</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Penggunaan Ditolak</p>
                        <h4 class="mb-0">
                            {{ $count_penggunaan_ditolak }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-secondary shadow-secondary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">meeting_room</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Penggunaan Selesai</p>
                        <h4 class="mb-0">
                            {{ $count_penggunaan_selesai }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Jadwal Selanjutnya</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @forelse ($jadwal as $row)
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <div class="table-responsive p-0 w-100">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                                    Kode MK</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Nama Mata Kuliah</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    SKS</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    T / P</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Kelas</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Hari</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Waktu</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Ruang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-sm ps-3">
                                                        {{ $row->mataKuliah->kode_mk }}
                                                    </h6>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->mataKuliah->nama_mk }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->mataKuliah->sks }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->mataKuliah->t_p }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->kelas }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->hari }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jam_mulai }}
                                                        -
                                                        {{ $row->jam_selesai }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->ruangan->no_ruangan }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <span>Tidak ada jadwal hari ini</span>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card">
                <div class=" card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Menunggu Persetujuan Penggunaan Ruangan</h6>
                        </div>
                        @if (Auth::user()->level == 'User' && $count_penggunaan_menunggu == 0)
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-info mb-0" href="{{ route('penggunaan.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajukan Penggunaan Ruangan</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12 overflow-auto">
                            <table class="table table-responsive w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                            User</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Ruangan</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Tanggal Pinjam</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Jam Masuk</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Jam Keluar</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Keterangan</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Status</th>
                                        <th
                                            class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penggunaan as $row)
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
                                        <td class="align-middle">
                                            @if (Auth::user()->level == 'User')
                                            <a href="{{ route('penggunaan.edit', $row->id) }}"
                                                class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                            <form action="{{ route('penggunaan.destroy', $row->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus penggunaan ruangan tersebut?')">Hapus</button>
                                            </form>
                                            @endif

                                            @if (Auth::user()->level == 'Admin')
                                            @if ($row->status == 'Menunggu')
                                            <form action="{{ route('penggunaan.update', $row->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="Diterima">
                                                <button type="submit" class="m-0 btn btn-sm bg-gradient-info"
                                                    onclick="return confirm('Apakah Anda yakin ingin menerima pengajuan ini?')">Acc</button>
                                            </form>

                                            <form action="{{ route('penggunaan.update', $row->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="Ditolak">
                                                <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menolak pengajuan ini?')">Tolak</button>
                                            </form>
                                            @else
                                            -
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="align-middle" colspan="8">
                                            <p class="text-xs font-weight-bold text-center mb-0">
                                                Tidak ada pengajuan penggunaan ruangan
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
    </div>
    @endsection