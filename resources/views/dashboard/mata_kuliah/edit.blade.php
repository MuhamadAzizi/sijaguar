@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Mata Kuliah</h6>
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

                    <form action="{{ route('mata-kuliah.update', $mata_kuliah->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div
                            class="input-group input-group-outline mt-3 @error('kode_mk') is-invalid @enderror is-filled">
                            <label class="form-label">Kode MK</label>
                            <input type="text" class="form-control" name="kode_mk" value="{{ $mata_kuliah->kode_mk }}">
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('nama_mk') is-invalid @enderror is-filled">
                            <label class="form-label">Mata Kuliah</label>
                            <input type="text" class="form-control" name="nama_mk" value="{{ $mata_kuliah->nama_mk }}">
                        </div>
                        <div class="input-group input-group-static mb-3 @error('dosen') is-invalid @enderror is-filled">
                            <label for="exampleFormControlSelect2" class="ms-0">Dosen</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="dosen_id">
                                @foreach ($dosen as $row)
                                <option value="{{ $row->id }}" {{ ($row->id == $mata_kuliah->dosen_id) ? 'selected' : ''
                                    }} >{{ $row->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-outline my-3 @error('sks') is-invalid @enderror is-filled">
                            <label class="form-label">SKS</label>
                            <input type="number" class="form-control" name="sks" value="{{ $mata_kuliah->sks }}">
                        </div>
                        <div class="input-group input-group-static mb-3 @error('t_p') is-invalid @enderror is-filled">
                            <label for="exampleFormControlSelect2" class="ms-0">Teori / Praktek</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="t_p">
                                <option value="T" {{ ($mata_kuliah->t_p == 'T' ) ? 'selected' : '' }}>Teori</option>
                                <option value="P" {{ ($mata_kuliah->t_p =='P' ) ? 'selected' : '' }}>Praktek</option>
                            </select>
                        </div>
                        <div
                            class="input-group input-group-outline my-3 @error('semester') is-invalid @enderror is-filled">
                            <label class="form-label">Semester</label>
                            <input type="number" class="form-control" name="semester"
                                value="{{ $mata_kuliah->semester }}">
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