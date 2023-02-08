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

    {{-- admin --}}
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Form Tambah Tahun Akademik</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('jadwal/tahun-akademik/tambah/kirim') ?>" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-8">
                                <div class="input-group input-group-static my-3">
                                    <label>Tahun Akademik</label>
                                    <input type="text" class="form-control" name="tahun_akademik"
                                        placeholder="xxxx/xxxx" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="input-group input-group-static my-3">
                                    <label for="form-label" class="ms-0">Semester</label>
                                    <select class="form-control" id="form-label" name="semester">
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <button class="m-0 btn bg-gradient-info" type="submit"
                                onclick="return confirm('Aksi ini akan membuat tahun akademik baru dan akan menonaktifkan tahun akademik yang lama. Apakah Anda yakin ingin melanjutkannya?')">
                                Tambah Tahun Akademik</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Jadwal Perkuliahan
                            Tahun Akademik
                            <?= $tahun_akademik['tahun_akademik'] ?> -
                            <?= $tahun_akademik['semester'] ?>
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table datatable table-responsive w-100 mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-4">
                                        Kode MK</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Nama Mata Kuliah</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        SKS</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        T / P</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Kelas</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Hari</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Waktu</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Ruang</th>
                                    <th
                                        class="bg-gradient-primary text-white text-uppercase text-secondary text-xxs font-weight-bolder ps-2">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $j) : ?>
                                <tr>
                                    <td class="align-middle">
                                        <h6 class="mb-0 text-sm ps-3">
                                            <?= $j['kode_mk'] ?>
                                        </h6>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['nama_mata_kuliah'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['sks'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['t_p'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['kelas'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['hari'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['jam_mulai'] ?> -
                                            <?= $j['jam_selesai'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?= $j['no_ruangan'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <?php if (session()->level == 'admin') : ?>
                                        <a href="<?= base_url('jadwal/edit/' . $j['id']); ?>"
                                            class="m-0 btn btn-sm bg-gradient-info">Edit</a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('jadwal/hapus/' . $j['id']); ?>"
                                            class="m-0 btn btn-sm bg-gradient-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal tersebut?')">Hapus</a>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <a href="<?= base_url('jadwal/tambah') ?>" class="m-0 btn bg-gradient-info">
                                Tambah Jadwal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>