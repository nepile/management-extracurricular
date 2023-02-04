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

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                    Kegiatan Ekskul
                    <?php if (session('role') == 'pelatih') : ?>
                        <button class="mb-0 btn btn-success" data-toggle="modal" data-target="#addKegiatan">+ Tambah Kegiatan</button>
                    <?php endif; ?>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addKegiatan" tabindex="-1" role="dialog" aria-labelledby="addKegiatanLabel" aria-hidden="true">
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

                            <form action="<?= base_url('/kegiatan_ekskul/store'); ?>" method="POST">
                                <div class="modal-body">
                                    <?= csrf_field(); ?>

                                    <div class="mt-2">
                                        <label class="mb-0 text-dark" for="kegiatan">Kegiatan:</label>
                                        <textarea name="kegiatan" id="kegiatan" class="form-control" cols="30" rows="10" placeholder="Deskripsi kegiatan.."></textarea>
                                    </div>

                                    <div class="mt-2">
                                        <label class="mb-0 text-dark" for="ekskul">Ekskul:</label>
                                        <input type="text" readonly name="ekskul" class="form-control" value="<?= session()->get('ekskul'); ?>" id="ekskul">
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

                <div class="card-body text-dark">
                    <h5 class="font-weight-bold mb-0">Laporan Kegiatan Ekskul</h5>

                    <div class="table-responsive mt-3">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kegiatan</th>
                                    <th>Ekskul</th>
                                    <th>Dibuat Pada</th>
                                    <?php if (session('role') == 'pelatih') : ?>
                                        <th>Handle</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>

                                <?php foreach ($kegiatan_ekskul as $item) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['kegiatan']; ?></td>
                                        <td><?= $item['ekskul']; ?></td>
                                        <td><?= $item['created_at']; ?></td>
                                        <?php if (session('role') == 'pelatih') : ?>
                                            <td>
                                                <button class="btn btn-info" data-toggle="modal" data-target="<?= '#edit' . $item['id'] ?>">
                                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        <?php endif; ?>
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

<?php foreach ($kegiatan_ekskul as $item) : ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="<?= 'edit' . $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= 'edit' . $item['id'] ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Edit Kegiatan Ekskul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('/kegiatan_ekskul/update/' . $item['id']); ?>" method="POST">
                    <div class="modal-body">
                        <?= csrf_field(); ?>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="kegiatan">Kegiatan:</label>
                            <textarea name="kegiatan" id="kegiatan" class="form-control" cols="30" rows="10" placeholder="Deskripsi kegiatan.."><?= $item['kegiatan']; ?></textarea>
                        </div>

                        <div class="mt-2">
                            <label class="mb-0 text-dark" for="ekskul">Ekskul:</label>
                            <input type="text" name="ekskul" id="ekskul" class="form-control" readonly value="<?= session()->get('ekskul'); ?>">
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