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
        + Tambah Akun Siswa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addEkskul" tabindex="-1" role="dialog" aria-labelledby="addEkskulLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">
                        Tambah Siswa
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('/data_siswa/store'); ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field(); ?>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="name">Nama Siswa:</label>
                            <input type="text" required class="form-control" placeholder="Masukkan Nama Siswa" name="name" id="name">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="user_id">NIS:</label>
                            <input type="number" min="0" required class="form-control" placeholder="Masukkan NIS" name="user_id" id="user_id">
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

                <div class="card-header bg-secondary text-light font-weight-bold">
                    Daftar Siswa
                </div>

                <div class="card-body text-dark">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Ekskul</th>
                                    <th>Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_siswa as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item['user_id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td>
                                            <?php if ($item['ekskul'] == null) : ?>
                                                <span class="text-danger" style="font-weight: bold;">Belum Ada</span>
                                            <?php else : ?>
                                                <span><?= $item['ekskul']; ?></span>
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

<?php foreach ($data_siswa as $item) : ?>
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
                    Yakin menghapus siswa <strong><?= $item['name'] ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <form action="<?= base_url('data_siswa/destroy/' . $item['id']); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($data_siswa as $item) : ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="<?= 'edit' . $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= 'edit' . $item['id'] ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Edit Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('/data_siswa/update/' . $item['id']); ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field(); ?>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="name">Nama Siswa:</label>
                            <input type="text" required class="form-control" value="<?= $item['name']; ?>" placeholder="Masukkan Nama Siswa" name="name" id="name">
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="user_id">NIS:</label>
                            <input type="number" required min="0" class="form-control" value="<?= $item['user_id']; ?>" placeholder="Masukkan NIS" name="user_id" id="user_id">
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