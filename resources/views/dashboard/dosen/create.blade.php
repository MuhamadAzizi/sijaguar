@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
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

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Dosen</h6>
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

                    <form action="{{ route('dosen.store') }}" method="post">
                        @csrf
                        <div
                            class="input-group input-group-outline my-3 @error('kode_dosen') is-invalid is-filled @enderror {{ old('kode_dosen') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Kode Dosen</label>
                            <input type="text" class="form-control" name="kode_dosen" value="{{ old('kode_dosen') }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('nama_dosen') is-invalid is-filled @enderror {{ old('nama_dosen') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="nama_dosen" value="{{ old('nama_dosen') }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('no_telp') is-invalid is-filled @enderror {{ old('no_telp') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="no_telp" value={{ old('no_telp') }}>
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('email') is-invalid is-filled @enderror {{ old('email') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value={{ old('email') }}>
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Tambah Dosen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection