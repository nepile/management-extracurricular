<?= $this->extend('layouts/auth') ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row bg-primary" style="height: 100vh;">
        <div class="col-xl-4 p-4" style="height: 100%; background: #fff;">
            <div class="col-12 d-flex align-items-center">
                <img src="<?= base_url('img/logo.png'); ?>" style="width: 70px;">
                <h5 class="ms-2" style="font-weight: bold;">SMP Yanuri</h5>
            </div>

            <div class="col-xl-9 col-12 mt-5">
                <h5 style="font-weight: bold;" class="mb-0">Selamat Datang!</h5>
                <p style="font-size: 13px;">Silakan login terlebih dahulu untuk mendapatkan akses.</p>
            </div>

            <div class="col-xl-12 mt-4">

                <?php if (session()->getFlashdata('err')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Login gagal!</strong> <?= session()->getFlashdata('err') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/pelatih_login'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="mt-3">
                        <label for="user_id" style="font-weight: 500;">NIP:</label>
                        <input type="text" class="form-control" name="user_id" id="user_id" value="<?= old('user_id'); ?>" style="border-radius: 5px; height: 50px;" placeholder="Masukkan NIP anda">
                    </div>

                    <div class="mt-4">
                        <label for="password" style="font-weight: 500;">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" style="border-radius: 5px; height: 50px;" placeholder="Masukkan Password anda">
                    </div>

                    <div class="mt-5">
                        <button class="btn" type="submit" style="background-color: #1167B1; width: 100%; color: #fff; height: 50px;">
                            Masuk
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xl-8 p-0 bg-warning d-xl-block d-none" style="height: 100%;">
            <img src="<?= base_url('img/pelatih_ils.jpg'); ?>" style="height: 100%; width: 100%; object-fit: cover;">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>