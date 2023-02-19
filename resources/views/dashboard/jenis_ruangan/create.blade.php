@extends('dashboard/master')
@section('title', $title)
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tambah Jenis Ruangan</h6>
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

                    <form action="{{ route('jenis-ruangan.store') }}" method="post">
                        @csrf
                        <div
                            class="input-group input-group-outline mb-3 @error('nama_jenis_ruangan') is-invalid is-filled @enderror {{ old('nama_jenis_ruangan') ? 'is-valid is-filled' : '' }}">
                            <label class="form-label">Nama Jenis Ruangan</label>
                            <input type="text" class="form-control" name="nama_jenis_ruangan"
                                value="{{ old('nama_jenis_ruangan') }}">
                        </div>
                        <button type="submit" class="btn bg-gradient-info" id="store">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    $('#store').click(function (e) {
        e.preventDefault();

        let token = $('input[name=_token]').val();
        let nama_jenis_ruangan = $('input[name=nama_jenis_ruangan]').val();

        $.ajax({
            url: "{{ route('jenis-ruangan.store') }}",
            type: "POST",
            data: {
                _token: token,
                nama_jenis_ruangan: nama_jenis_ruangan,
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    })
</script>