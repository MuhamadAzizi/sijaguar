@extends('dashboard.master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tabel Pengajuan Penggunaan Ruangan</h6>
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
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
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
                                    <td class="align-middle">
                                        @if (Auth::user()->level == 'User')
                                        <a href="{{ route('penggunaan.edit', $row->id) }}"
                                            class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                        <form action="{{ route('penggunaan.destroy', $row->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')">Hapus</button>
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
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('penggunaan.create') }}" class="m-0 btn bg-gradient-info">
                                Ajukan Pengajuan penggunaan Ruangan</a>
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
        $('#tabel-penggunaan').DataTable({
            responsive: true
        });
    });
</script>
@endsection