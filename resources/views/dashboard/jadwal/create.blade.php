@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Jadwal</h6>
                    </div>
                </div>
                <div class="card-body pb-2">

                    @if (Auth::user()->level == 'Admin')
                    <form action="{{ route('jadwal.store') }}" method="post">
                        @csrf

                        <!-- Tahun akademik -->
                        <input type="text" class="form-control" name="tahun_akademik_id"
                            value="{{ $tahun_akademik->id }}" required hidden>
                        <div class="input-group input-group-static mb-4">
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
                        <div class="input-group input-group-static mb-4">
                            <label for="form-label" class="ms-0">Mata Kuliah</label>
                            <select class="form-control" id="form-label" name="mata_kuliah_id">
                                @foreach ($mata_kuliah as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->kode_mk }} -
                                    {{ $row->nama_mk }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="input-group input-group-static my-3">
                                    <label for="form-label" class="ms-0">Hari</label>
                                    <select class="form-control" id="form-label" name="hari">
                                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                                        <option value="{{ $hari }}">
                                            {{ $hari }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Jam Mulai</label>
                                    <input type="time" class="form-control" name="jam_mulai" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Jam Selesai</label>
                                    <input type="time" class="form-control" name="jam_selesai" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Simpan
                        </button>
                    </form>
                    @endif

                    @if (Auth::user()->level == 'User')
                    <form action="{{ route('jadwal.store') }}" method="post">
                        @csrf
                        <div class="input-group input-group-static mb-4">
                            <label for="form-label" class="ms-0">Jadwal</label>
                            <select class="form-control" id="form-label" name="jadwal_id">
                                @foreach ($jadwal as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->kode_mk }} -
                                    {{ $row->nama_mk }} -
                                    {{ $row->hari }},
                                    {{ $row->jam_mulai }}-
                                    {{ $row->jam_selesai }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Tambah
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection