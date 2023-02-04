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
            <?php if (session('ekskul') == null) : ?>
                <div class="card shadow">
                    <div class="card-header font-weight-bold <?php if ($count_user_id >= 2) : ?>  bg-danger <?php else : ?> bg-primary <?php endif; ?> text-light">
                        <?php if ($count_user_id >= 2) : ?>
                            Maaf, Kamu sudah mendaftar 2 ekskul sebelumnya!
                        <?php else : ?>
                            Pilih ekskul yang kamu minati!
                        <?php endif; ?>
                    </div>

                    <?php if ($count_user_id >= 2) : ?>
                        <div class="card-body text-dark font-weight-bold">
                            <p class="mb-0 text-center  ">Mohon menunggu konfirmasi dari pelatih setiap ekskul yang kamu daftarkan!</p>
                        </div>
                    <?php else : ?>
                        <div class="card-body text-dark">
                            <h5 class="font-weight-bold mb-0">Formulir Pendaftaran Ekskul</h5>
                            <p>
                                Kamu hanya bisa mendaftarkan sebanyak 2 ekskul saja!
                            </p>

                            <form action="<?= base_url('/pendaftaran_ekskul/store'); ?>" method="POST">
                                <?= csrf_field(); ?>
                                <div class="mt-2">
                                    <label for="name" class="mb-0">Nama Lengkap:</label>
                                    <input type="text" class="form-control" required placeholder="Nama Lengkap Anda" readonly value="<?= session('name'); ?>" name="name" id="name">
                                </div>
                                <div class="mt-3">
                                    <label for="siswa_id" class="mb-0">NIS:</label>
                                    <input type="text" class="form-control" required placeholder="NIS Anda" readonly value="<?= session('user_id'); ?>" name="siswa_id" id="siswa_id">
                                </div>
                                <div class="mt-3">
                                    <label for="id_ekskul" class="mb-0">Ekskul:</label>
                                    <select name="id_ekskul" required class="form-control" id="id_ekskul">
                                        <option value="">-Pilih Ekskul yang diminati-</option>
                                        <?php foreach ($ekskul as $item) : ?>
                                            <?php if ($item['nama_ekskul'] != 'Pramuka') : ?>
                                                <?php if ($item['kuota'] == false || $item['kuota'] == 0) : ?>
                                                    <option disabled class="text-danger font-weight-bold"><?= $item['nama_ekskul'] . " " . "(" .  'Full' . ")"; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $item['nama_ekskul']; ?>"><?= $item['nama_ekskul'] . " " . "(Kuota : " .  $item['kuota'] . ")"; ?></option>
                                                <?php endif ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <input type="checkbox" name="agree" id="agree" required>
                                    <label for="agree">
                                        Saya setuju dengan aturan dan persyaratan ekskul yang saya pilih.
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2">Daftar</button>
                            </form>
                        </div>

                    <?php endif; ?>
                </div>
            <?php else : ?>
                <div class="card shadow p-4 bg-success text-light">
                    <h5 style="font-weight: bold;" class="text-center mb-0">Selamat! anda berhasil diterima dan bergabung di ekskul <?= session('ekskul'); ?></h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>