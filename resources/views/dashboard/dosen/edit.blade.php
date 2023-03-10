@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Dosen</h6>
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

                    <form action="{{ route('dosen.update', $dosen->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div
                            class="input-group input-group-outline my-3 @error('kode_dosen') is-invalid is-filled @enderror is-filled">
                            <label class="form-label">Kode Dosen</label>
                            <input type="text" class="form-control" name="kode_dosen" value="{{ $dosen->kode_dosen }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('nama_dosen') is-invalid is-filled @enderror is-filled">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="nama_dosen" value="{{ $dosen->nama_dosen }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('no_telp') is-invalid is-filled @enderror is-filled">
                            <label class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="no_telp" value="{{ $dosen->no_telp }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('email') is-invalid is-filled @enderror is-filled">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $dosen->email }}">
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