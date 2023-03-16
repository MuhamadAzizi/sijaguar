@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
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
                        <h6 class="text-white text-capitalize ps-3">Daftar Mata Kuliah</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table id="tabel-mata-kuliah" class="table table-responsive w-100 mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        Kode MK</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Dosen</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        SKS</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        T / P</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Semester</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mata_kuliah as $row)
                                <tr>
                                    <td class="align-middle">
                                        <h6 class="mb-0 text-sm ps-3">
                                            {{ $row->kode_mk }}
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->nama_mk }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->sks }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->t_p }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $row->semester }}
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('mata-kuliah.edit', $row->id) }}"
                                            class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                        <form action="{{ route('mata-kuliah.destroy', $row->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah tersebut?')">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('mata-kuliah.create') }}" class="m-0 btn bg-gradient-info">
                                Tambah Mata Kuliah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('datatable-script')
<script>
    $(document).ready(function() {
        $('#tabel-mata-kuliah').DataTable({
            responsive: true
        });
    });
</script>
@endsection