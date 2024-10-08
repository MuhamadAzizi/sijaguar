@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Mata Kuliah</h6>
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

                    <form action="{{ route('mata-kuliah.store') }}" method="post">
                        @csrf
                        <div
                            class="input-group input-group-outline mb-3 @error('kode_mk') is-invalid is-filled @enderror {{ old('kode_mk') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Kode MK</label>
                            <input type="text" class="form-control" name="kode_mk" value="{{ old('kode_mk') }}">
                        </div>
                        <div
                            class="input-group input-group-outline mb-3 @error('nama_mk') is-invalid is-filled @enderror {{ old('nama_mk') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Mata Kuliah</label>
                            <input type="text" class="form-control" name="nama_mk" value="{{ old('nama_mk') }}">
                        </div>
                        <div
                            class="input-group input-group-outline mb-3 @error('sks') is-invalid is-filled @enderror {{ old('sks') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">SKS</label>
                            <input type="number" class="form-control" name="sks" value="{{ old('sks') }}">
                        </div>
                        <div
                            class="input-group input-group-static mb-3 @error('t_p') is-invalid is-filled @enderror {{ old('t_p') ? 'is-valid is-filled' : '' }}">
                            <label for="exampleFormControlSelect2" class="ms-0">Teori / Praktek</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="t_p">
                                <option value="T" {{ (old('t_p')=='T' ) ? 'selected' : '' }}>Teori</option>
                                <option value="P" {{ (old('t_p')=='P' ) ? 'selected' : '' }}>Praktek</option>
                            </select>
                        </div>
                        <div
                            class="input-group input-group-outline mb-3 @error('semester') is-invalid is-filled @enderror {{ old('semester') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Semester</label>
                            <input type="number" class="form-control" name="semester" value="{{ old('semester') }}">
                        </div>
                        <button type="submit" class="btn bg-gradient-info">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection