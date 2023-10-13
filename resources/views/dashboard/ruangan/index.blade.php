@extends('dashboard.master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    @if (Auth::user()->level == 'Admin')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Cek Status Ruangan</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group input-group-static">
                                    <label for="form-label" class="ms-0">Ruangan</label>
                                    <select class="form-control" id="form-label" name="ruangan_id">
                                        @foreach ($ruangan as $row)
                                        <option value="{{ $row->id }}">
                                            {{ $row->no_ruangan }} -
                                            {{ $row->nama_jenis_ruangan }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-static">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tanggal_pinjam" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-info mt-3">
                            Cek
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tabel Ruangan</h6>
                    </div>
                </div>

                <div class="card-body">
                    <div>
                        <table id="tabel-ruangan" class="table w-100 datatable mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        No Ruangan</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Jenis Ruangan</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                @foreach ($ruangan as $row)
                                <tr>
                                    <td class="align-middle">
                                        <h6 class="mb-0 text-sm ps-3">
                                            {{ $row->no_ruangan }}
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->jenisRuangan->nama_jenis_ruangan }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('ruangan.edit', $row->id) }}"
                                            class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                        <form action="{{ route('ruangan.destroy', $row->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('ruangan.create') }}" class="m-0 btn bg-gradient-info">
                                Tambah Ruangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tabel Jenis Ruangan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table id="tabel-jenis-ruangan" class="table table-responsive w-100 mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        Jenis Ruangan</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_ruangan as $row)
                                <tr>
                                    <td class="align-middle">
                                        <p class="ps-3 text-xs font-weight-bold mb-0">
                                            {{ $row->nama_jenis_ruangan }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('jenis-ruangan.edit', $row->id) }}"
                                            class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                        <form action="{{ route('jenis-ruangan.destroy', $row->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus jenis ruangan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('jenis-ruangan.create') }}" class="m-0 btn bg-gradient-info">
                                Tambah Jenis Ruangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (Auth::user()->level == 'User')
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Daftar Ruangan</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table id="tabel-jenis-ruangan" class="table w-100 table-responsive mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        No Ruangan</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Jenis Ruangan</th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                @foreach ($ruangan as $row)
                                <tr>
                                    <td class="align-middle">
                                        <h6 class="mb-0 text-sm ps-3">
                                            {{ $row->no_ruangan }}
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->jenisRuangan->nama_jenis_ruangan }}
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('penggunaan.create') }}" class="m-0 btn bg-gradient-info">
                                Ajukan Pengajuan Penggunaan Ruangan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Cek Status Ruangan</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form action="" method="post">
                        <label for="form-label" class="ms-0">Ruangan</label>
                        <div class="input-group input-group-static mb-4">
                            <select class="form-control" id="form-label" name="ruangan_id">
                                @foreach ($ruangan as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->no_ruangan }} -
                                    {{ $row->nama_jenis_ruangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal_pinjam">
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Cek
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('datatable-script')
<script>
    $(document).ready(function() {
        $('#tabel-ruangan').DataTable({
            responsive: true
        });

        $('#tabel-jenis-ruangan').DataTable({
            responsive: true
        });
    });
</script>
@endsection