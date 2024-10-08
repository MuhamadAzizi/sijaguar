@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    @can('isAdmin')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Tambah Tahun Akademik</h6>
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

                    <form action="{{ route('tahun-akademik.store') }}" method="post">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-12 col-sm-8">
                                <div
                                    class="input-group input-group-outline mb-3 @error('tahun_akademik') is-invalid is-filled @enderror {{ old('tahun_akademik') ? 'is-valid is-filled' : '' }}">
                                    <label class="form-label">Tahun Akademik</label>
                                    <input type="text" class="form-control" name="tahun_akademik"
                                        value="{{ old('tahun_akademik') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="input-group input-group-static mb-3">
                                    <label for="form-label" class="ms-0">Semester</label>
                                    <select class="form-control" id="form-label" name="semester">
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <button class="m-0 btn bg-gradient-info" type="submit"
                                onclick="return confirm('Aksi ini akan membuat tahun akademik baru dan akan menonaktifkan tahun akademik yang lama. Apakah Anda yakin ingin melanjutkannya?')">
                                Tambah Tahun Akademik</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Jadwal Perkuliahan
                            Tahun Akademik {{ $tahun_akademik->tahun_akademik }} - {{ $tahun_akademik->semester }}
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table id="tabel-jadwal" class="table table-responsive w-100 mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        Kode MK</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Nama Mata Kuliah</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Dosen</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        SKS</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        T / P</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Kelas</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Hari</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Waktu</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Ruang</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // print_r($jadwal->dosen);    
                                ?>
                                @foreach ($jadwal as $row)
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
                                            {{ $row->dosen->nama_dosen }}
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
                                            {{ $row->jam_mulai }} -
                                            {{ $row->jam_selesai }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->ruangan->no_ruangan }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        
                                        @can('isAdmin')
                                        <a href="{{ route('jadwal.edit', $row->id) }}"
                                            class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                        @endcan

                                        <form action="{{ route('jadwal.destroy', $row->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal tersebut?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('jadwal.create') }}" class="m-0 btn bg-gradient-info">
                                Tambah Jadwal</a>
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
        $('#tabel-jadwal').DataTable({
            responsive: true,
            order: [
                [6, 'desc'],
                [7, 'asc']
            ]
        });
    });
</script>
@endsection