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

    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-header bg-primary text-light font-weight-bold">
                    Ekskul <?= session('ekskul') ?>
                </div>

                <div class="card-body text-dark">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <?php if (session('ekskul') != 'Pramuka') : ?>
                                <a class="nav-item nav-link active" id="nav-semua-tab" data-toggle="tab" href="#nav-semua" role="tab" aria-controls="nav-semua" aria-selected="true">Semua</a>
                                <a class="nav-item nav-link" id="nav-diterima-tab" data-toggle="tab" href="#nav-diterima" role="tab" aria-controls="nav-diterima" aria-selected="false">Diterima</a>
                            <?php else : ?>
                                <a class="nav-item nav-link active" id="nav-diterima-tab" data-toggle="tab" href="#nav-diterima" role="tab" aria-controls="nav-diterima" aria-selected="true">Diterima</a>
                                <a class="nav-item nav-link" id="nav-semua-tab" data-toggle="tab" href="#nav-semua" role="tab" aria-controls="nav-semua" aria-selected="false">Semua</a>
                            <?php endif; ?>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade <?php if (session('ekskul') != 'Pramuka') : ?> show active <?php endif; ?>" id="nav-semua" role="tabpanel" aria-labelledby="nav-semua-tab">
                            <div class="table-responsive mt-3">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Ekskul</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php foreach ($pendaftaran_ekskul as $item) : ?>
                                            <?php if (session('ekskul') == $item['id_ekskul'] && $item['ekskul'] == null) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $item['user_id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td><?= $item['id_ekskul']; ?></td>
                                                    <td><span class="bg-secondary px-3 text-light" style="border-radius: 20px; font-size: 12px;">Belum dikonfirmasi</span></td>
                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal" data-target="<?= '#check' . $item['id'] ?>">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </button>
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="<?= '#discheck' . $item['id'] ?>">
                                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade <?php if (session('ekskul') == 'Pramuka') : ?> show active <?php endif; ?>" id="nav-diterima" role="tabpanel" aria-labelledby="nav-diterima-tab">
                            <div class="table-responsive mt-3">
                                <table class="table" id="dataTable2">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Ekskul</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php if (session('ekskul') == 'Pramuka') : ?>
                                            <?php foreach ($ekskul_wajib as $item) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $item['user_id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td>Pramuka</td>
                                                    <td><span class="px-3 bg-info text-light" style="border-radius: 20px;">Wajib</span></td>
                                                </tr>
                                            <?php endforeach; ?>

                                        <?php else : ?>
                                            <?php foreach ($siswa as $item) : ?>
                                                <?php if ($item['ekskul'] != null && $item['ekskul'] == session('ekskul')) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $item['user_id']; ?></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['ekskul']; ?></td>
                                                        <td><span class="px-3 bg-success text-light" style="border-radius: 20px;">Diterima</span></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($pendaftaran_ekskul as $item) : ?>
    <!-- Delete Modal -->
    <div class="modal fade" id="<?= 'check' . $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= 'check' . $item['id'] ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light font-weight-bold" id="exampleModalLongTitle">Yakin menerima siswa berikut?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <label class="mb-0">Nama Siswa:</label>
                        <input type="text" disabled value="<?= $item['name']; ?>" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label class="mb-0">NIS:</label>
                        <input type="text" disabled value="<?= $item['siswa_id']; ?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <form action="<?= base_url('manajemen_ekskul/diterima/' . $item['id']); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="ekskul" value="<?= $item['id_ekskul']; ?>">
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($pendaftaran_ekskul as $item) : ?>
    <!-- Delete Modal -->
    <div class="modal fade" id="<?= 'discheck' . $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="<?= 'discheck' . $item['id'] ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-light font-weight-bold" id="exampleModalLongTitle">Yakin menolak siswa berikut?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <label class="mb-0">Nama Siswa:</label>
                        <input type="text" disabled value="<?= $item['name']; ?>" class="form-control">
                    </div>
                    <div class="mt-2">
                        <label class="mb-0">NIS:</label>
                        <input type="text" disabled value="<?= $item['user_id']; ?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <form action="<?= base_url('manajemen_ekskul/ditolak/' . $item['id']); ?>" method="POST">
                        <?= csrf_field(); ?>
                        <input type="hidden" value="<?= $item['ekskul']; ?>" name="ekskul" class="form-control">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>