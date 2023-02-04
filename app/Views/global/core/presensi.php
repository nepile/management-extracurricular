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
                <div class="card-body">
                    <h4 class="font-weight-bold">Presensi Ekskul</h4>
                    <?php if (session('ekskul') != null) : ?>
                        <p>Pastikan mengisi ekskul dengan benar dan sesuai dengan tanggal nya!</p>
                        <div class="mt-3">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#presensi">Presensi</button>
                        </div>
                    <?php else : ?>
                        <p>Maaf, anda belum mempunyai ekskul sebelumnya.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="presensi" tabindex="-1" role="dialog" aria-labelledby="presensiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">
                    Presensi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('/presensi/store'); ?>" method="POST">
                <div class="modal-body">
                    <?= csrf_field(); ?>

                    <div class="mt-2">
                        <label class="mb-0 text-dark" for="name">Nama Siswa:</label>
                        <input type="text" required class="form-control" readonly placeholder="Masukkan Nama" value="<?= session('name'); ?>" name="name" id="name">
                    </div>

                    <div class="mt-2">
                        <label class="mb-0 text-dark" for="user_id">NIS:</label>
                        <input type="text" required class="form-control" readonly placeholder="Masukkan NIS/NIP" value="<?= session('user_id') ?>" name="user_id" id="user_id">
                    </div>

                    <div class="mt-2">
                        <label class="mb-0 text-dark" for="role">Role:</label>
                        <input type="text" required class="form-control" readonly placeholder="Masukkan Role" value="<?= session('role') ?>" name="role" id="role">
                    </div>

                    <div class="mt-2">
                        <label class="mb-0 text-dark" for="ekskul">Ekskul:</label>
                        <select name="ekskul" required id="ekskul" <?php if (session('role') == 'pelatih') : ?> aria-readonly="true" <?php endif; ?> class="form-control">
                            <?php if (session('ekskul') != null) : ?>
                                <?php if (session('role') == 'siswa') : ?>
                                    <option value="<?= session('ekskul'); ?>"><?= session('ekskul'); ?></option>
                                    <option value="Pramuka">Pramuka</option>
                                <?php elseif (session('role') == 'pelatih' && session('ekskul') != 'Pramuka') : ?>
                                    <option value="<?= session('ekskul'); ?>"><?= session('ekskul'); ?></option>
                                <?php elseif (session('role') == 'pelatih' && session('ekskul') == 'Pramuka') : ?>
                                    <option value="Pramuka">Pramuka</option>
                                <?php endif; ?>
                            <?php else : ?>
                                <option value="Pramuka">Pramuka</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Presensi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>