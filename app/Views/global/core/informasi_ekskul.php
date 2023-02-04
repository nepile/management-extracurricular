<?= $this->extend('layouts/app'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold d-xl-none d-inline-block"><?= $title; ?></h1>
        <p class="mb-0">
            <a href="<?= base_url('/dash'); ?>"> <i class="fa fa-home"></i> Beranda </a> / <?= $title; ?>
        </p>
    </div>

    <?= $this->include('components/alert'); ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEkskul">
        + Tambah Ekskul
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addEkskul" tabindex="-1" role="dialog" aria-labelledby="addEkskulLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">
                        Tambah Ekskul
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('/informasi_ekskul/store'); ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field(); ?>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="nama_ekskul">Nama Ekskul:</label>
                            <input type="text" required class="form-control" placeholder="Masukkan Nama Ekskul" name="nama_ekskul" id="nama_ekskul">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="kuota">Kuota:</label>
                            <input type="number" min="0" class="form-control" required placeholder="Masukkan kuota ekskul" name="kuota" id="kuota">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="pukul">Jam Ekskul:</label>
                            <input type="time" class="form-control" required placeholder="Pukul pelaksanaan ekskul" name="pukul" id="pukul">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="hari">Hari:</label>
                            <select name="hari" id="hari" class="form-control" required>
                                <option value="">-Pilih Hari-</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-header bg-gradient-primary text-light font-weight-bold">
                    Daftar Ekskul
                </div>

                <div class="card-body text-dark">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Ekskul</th>
                                    <th>Hari</th>
                                    <th>Pukul</th>
                                    <th>Kuota</th>
                                    <th>Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($ekskul as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item['nama_ekskul'] ?></td>
                                        <td><?= ucfirst($item['hari']); ?></td>
                                        <td><?= $item['pukul'] ?></td>
                                        <td>
                                            <?php if ($item['nama_ekskul'] == 'Pramuka') : ?>
                                                <span class="px-3 bg-success text-light" style="border-radius: 20px;">unlimited</span>
                                            <?php else : ?>
                                                <span class="px-3"><?= $item['kuota']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="<?= '#hapus' . $item['id'] ?>">
                                                <i class="fa fa-ban" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-info" data-toggle="modal" data-target="<?= '#edit' . $item['id'] ?>">
                                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($ekskul as $item) : ?>
    <!-- Delete Modal -->
    <div class="modal fade" id="<?= 'hapus' . $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= 'hapus' . $item['id'] ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Perhatian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin menghapus ekskul <strong><?= $item['nama_ekskul'] ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <form action="<?= base_url('informasi_ekskul/destroy/' . $item['id']); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($ekskul as $item) : ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="<?= 'edit' . $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= 'edit' . $item['id'] ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Edit Ekskul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('/informasi_ekskul/update/' . $item['id']); ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field(); ?>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="nama_ekskul">Nama Ekskul:</label>
                            <input type="text" required class="form-control" value="<?= $item['nama_ekskul']; ?>" placeholder="Masukkan Nama Ekskul" name="nama_ekskul" id="nama_ekskul">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="kuota">Kuota:</label>
                            <input type="number" min="0" class="form-control" required value="<?= $item['kuota']; ?>" placeholder="Masukkan kuota ekskul" name="kuota" id="kuota">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="pukul">Jam Ekskul:</label>
                            <input type="time" class="form-control" required value="<?= $item['pukul']; ?>" placeholder="Pukul pelaksanaan ekskul" name="pukul" id="pukul">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="hari">Hari:</label>
                            <select name="hari" id="hari" required class="form-control">
                                <option value="<?= $item['hari']; ?>"><?= ucfirst($item['hari']); ?></option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                                <option value="sabtu">Sabtu</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>




<?= $this->endSection(); ?>