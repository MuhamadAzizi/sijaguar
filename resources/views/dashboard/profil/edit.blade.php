@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if ($errors->any())
    <div class="alert alert-danger text-white" role="alert">
        <ul class="m-0">
            @foreach ($errors->all() as $error)
            <li><small>{{ $error }}</small></li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger text-white" role="alert">
        <ul class="m-0">
            <li><small>{{ session('error') }}</small></li>
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Profil</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form action="{{ route('profil.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="d-flex">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ asset('img/user/' . $user->foto) }}" alt="profile_image"
                                    class="w-100 h-100 border-radius-lg shadow-sm" style="object-fit: cover;">
                            </div>
                            <div class="ms-3 w-100">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control border p-2" type="file" id="formFile" name="foto">
                            </div>
                        </div>
                        <div class="input-group input-group-outline my-3 is-filled">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        </div>
                        <div class="input-group input-group-outline my-3 is-filled">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
                        </div>
                        <button type="submit" class="btn bg-gradient-info"
                            onclick="return alert('Apakah Anda yakin ingin mengubah data?')">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Ubah Password</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <form action="{{ route('profil.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Password lama</label>
                            <input type="password" class="form-control" name="password_lama" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Password baru</label>
                            <input type="password" class="form-control" name="password_baru" required>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Konfirmasi password baru</label>
                            <input type="password" class="form-control" name="password_baru_confirmation" required>
                        </div>
                        <button type="submit" class="btn bg-gradient-info"
                            onclick="return alert('Tindakan ini akan mengubah password Anda, apakah Anda yakin ingin melanjutkannya?')">
                            Ubah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection