@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Ruangan</h6>
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

                    <form action="{{ route('ruangan.store') }}" method="post">
                        @csrf
                        <div
                            class="input-group input-group-outline mb-3 @error('no_ruangan') is-invalid is-filled @enderror {{ old('no_ruangan') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">No Ruangan</label>
                            <input type="text" class="form-control" name="no_ruangan" value="{{ old('no_ruangan') }}">
                        </div>
                        <label for="form-label" class="ms-0">Jenis Ruangan</label>
                        <div
                            class="input-group input-group-static mb-3 @error('jenis_ruangan_id') is-invalid is-filled @enderror {{ old('jenis_ruangan_id') ? 'is-valid is-filled' : '' }}">
                            <select class="form-control" id="form-label" name="jenis_ruangan_id">
                                @foreach ($jenis_ruangan as $row)
                                <option value="{{ $row->id }}">
                                    {{ $row->nama_jenis_ruangan }}
                                </option>
                                @endforeach
                            </select>
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