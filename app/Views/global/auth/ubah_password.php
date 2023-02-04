<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<section class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?= $this->include('components/alert.php'); ?>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('/ubah_password'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="mt-1">
                            <label for="password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Password Lama">
                        </div>

                        <div class="mt-3">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password Baru">
                        </div>

                        <div class="mt-3">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password Baru">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>