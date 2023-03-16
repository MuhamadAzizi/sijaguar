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
                            <a href="{{ route('view.index') }}" class="m-0 btn bg-gradient-info">
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
                                    <table id="tabel-verifikasi-jadwal" class="table align-items-center mb-0">
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
                                            <tr>
                                                <td class="align-middle">
                                                    <h6 class="mb-0 text-sm ps-3">
                                                        {{ $row->jadwal->mataKuliah->kode_mk }}
                                                    </h6>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->mataKuliah->nama_mk }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->dosen->nama_dosen }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->mataKuliah->sks }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->mataKuliah->t_p }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->kelas }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->hari }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->jam_mulai }}
                                                        -
                                                        {{ $row->jadwal->jam_selesai }}
                                                    </p>
                                                </td>
                                                <td class="align-middle">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->jadwal->ruangan->no_ruangan }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="align-middle {{ ($row->status == 'Hadir') ? 'bg-success text-white' : (($row->status == 'Tidak Hadir') ? 'bg-danger text-white' : (($row->status == 'Menunggu') ? 'bg-warning text-white' : '')) }}">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $row->status }}
                                                    </p>
                                                </td>
                                                </td>
                                                <td class="align-middle">
                                                    @if ($row->status == 'Menunggu')
                                                    <form method="post"
                                                        action="{{ route('verifikasi-jadwal.update', $row->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                                        <input type="hidden" name="status" value="Hadir">
                                                        <button class="m-0 btn btn-sm btn-success"
                                                            type="submit">Verifikasi</a>
                                                        </button>
                                                    </form>

                                                    <form method="post"
                                                        action="{{ route('verifikasi-jadwal.update', $row->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                                        <input type="hidden" name="status" value="Tidak Hadir">
                                                        <button class="m-0 btn btn-sm btn-danger" type="submit">Tidak
                                                            Hadir</a>
                                                        </button>
                                                    </form>
                                                    @else
                                                    -
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('datatable-script')
<script>
    $(document).ready(function() {
        $('#tabel-verifikasi-jadwal').DataTable({
            responsive: true,
            order: [
                [7, 'asc']
            ]
        });
    });
</script>
@endsection