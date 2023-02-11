@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">
                    {{ session('success') }}
                </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif

    @if ($verifikasi_jadwal->isEmpty())
    <form action="{{ route('verifikasi-jadwal.store') }}" method="post">
        @csrf
        <button type="submit" class="btn bg-gradient-info mb-3">
            <i class="fas fa-plus"></i>
            &nbsp;Buat Verifikasi Jadwal
        </button>
    </form>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <h6 class="mb-0">Verifikasi Jadwal</h6>
                            <a href="{{ route('verifikasi-jadwal.view-mode') }}" class="m-0 btn bg-gradient-info">
                                <i class="fas fa-eye"></i>
                                &nbsp;View Mode
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
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
                                                    Dosen</th>
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
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Status</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($verifikasi_jadwal as $row)
                                            @if ($row->status == 'Menunggu')
                                            <form method="post"
                                                action="{{ route('verifikasi-jadwal.update', $row->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <input type="hidden" name="status" value="Hadir">
                                                @endif

                                                <tr
                                                    class="{{ ($row->status == 'Hadir') ? 'bg-success text-white' : (($row->status == 'Tidak Hadir') ? 'bg-danger text-white' : '') }}">
                                                    <td class="align-middle">
                                                        <h6 class="mb-0 text-sm ps-3">
                                                            {{ $row->kode_mk }}
                                                        </h6>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $row->nama_mk }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $row->dosen }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $row->sks }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $row->t_p }}
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
                                                            {{ $row->no_ruangan }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $row->status }}
                                                        </p>
                                                    </td>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($row->status == 'Menunggu')
                                                        <button class="m-0 btn btn-sm btn-success"
                                                            type="submit">Verifikasi</a>
                                                            @else
                                                            -
                                                            @endif
                                                    </td>
                                                </tr>
                                                @if ($row->status == 'Hadir')
                                            </form>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection