@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">

    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tabel User</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table id="tabel-users" class="table table-responsive w-100 mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Nama</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        Username</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        Level</th>
                                    <th
                                        class="bg-gradient-info text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $row)
                                <tr>
                                    <td class="align-middle d-flex align-items-center">
                                        <img src="{{ asset('img/user/' . $row->foto) }}" class="avatar avatar-sm me-3">
                                        <h6 class="mb-0 text-sm">
                                            {{ $row->nama }}
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-xs font-weight-bold mb-0">
                                            {{ $row->username }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <span class="text-xs font-weight-bold mb-0">
                                            {{ $row->level }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('user.show', $row->id) }}"
                                            class="m-0 btn btn-sm bg-gradient-dark">Lihat</a>
                                        <form action="{{ route('user.destroy', $row->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="m-0 btn btn-sm bg-gradient-danger"
                                                onclick="return confirm('Apakah kamu yakin ingin menghapus user ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="{{ route('user.create') }}" class="m-0 btn bg-gradient-info">
                                Tambah User</a>
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
        $('#tabel-users').DataTable({
            responsive: true,
            order: [
                [2, 'asc']
            ]
        });
    });
</script>
@endsection