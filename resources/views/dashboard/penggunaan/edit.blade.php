@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Pengajuan Penggunaan Ruangan</h6>
                    </div>
                </div>
                <div class="card-body pb-2">

                    @if ($errors->any())
                    <div class="alert alert-danger text-white" role="alert">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                            <li><small>{{ $error }}</small></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('penggunaan.update', $penggunaan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-outline my-3 is-filled is-valid">
                            <label class="form-label">User</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->username }}" readonly>
                        </div>
                        <label for="form-label" class="ms-0">Ruangan</label>
                        <div class="input-group input-group-static mb-4">
                            <select class="form-control" id="form-label" name="ruangan_id">
                                @foreach ($ruangan as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->no_ruangan }} -
                                    {{ $row->jenisRuangan->nama_jenis_ruangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="input-group input-group-static my-3">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tanggal_penggunaan"
                                        value="{{ $penggunaan->tanggal_penggunaan }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Jam Masuk</label>
                                    <input type="time" class="form-control" name="jam_masuk"
                                        value="{{ $penggunaan->jam_masuk }}">
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="input-group input-group-static my-3">
                                    <label>Jam Keluar</label>
                                    <input type="time" class="form-control" name="jam_keluar"
                                        value="{{ $penggunaan->jam_keluar }}">
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Keterangan Pengajuan Peminjaman Ruangan</label>
                            <textarea class="form-control" name="keterangan"
                                rows="3">{{ $penggunaan->keterangan }}</textarea>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Ajukan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection