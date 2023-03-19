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
                        <h6 class="text-white text-capitalize ps-3">Tambah User</h6>
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

                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-100">
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control border p-2" type="file" id="formFile" name="foto">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('username') is-invalid is-filled @enderror {{ old('username') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('nama') is-invalid is-filled @enderror {{ old('nama') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div
                            class="input-group input-group-static mb-3 @error('level') is-invalid is-filled @enderror {{ old('level') ? 'is-valid is-filled' : '' }}">
                            <label for="exampleFormControlSelect2" class="ms-0">Level</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="level">
                                <option value="User" {{ (old('level')=='User' ) ? 'selected' : '' }}>User</option>
                                <option value="Admin" {{ (old('level')=='Admin' ) ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('password') is-invalid is-filled @enderror">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Buat User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection