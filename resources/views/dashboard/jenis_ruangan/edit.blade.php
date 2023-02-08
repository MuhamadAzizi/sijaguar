@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Jenis Ruangan</h6>
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

                    <form action="{{ route('jenis-ruangan.update', $jenis_ruangan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div
                            class="input-group input-group-outline mb-3 @error('nama_jenis_ruangan') is-invalid @enderror is-filled">
                            <label class="form-label">Nama Jenis Ruangan</label>
                            <input type="text" class="form-control" name="nama_jenis_ruangan"
                                value="{{ $jenis_ruangan->nama_jenis_ruangan }}">
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection