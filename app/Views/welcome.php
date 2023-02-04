<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | Management Ekskul</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('fonts/poppins.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/splash.css'); ?>">
    <link rel="icon" href="<?= base_url('img/logo.png'); ?>">
</head>

<body>
    <div class="splash" style="background-color: #fff;">
        <img src="<?= base_url('img/logo.png'); ?>" class="fade-in">
    </div>

    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center" style="height: 100vh; background: radial-gradient(circle at 12% 55%,rgba(33,150,243,.15),hsla(0,0%,100%,0) 25%),radial-gradient(circle at 85% 33%,rgba(108,99,255,.175),hsla(0,0%,100%,0)   25%);">
            <div class="col-12 col-xl-10">
                <div class="card p-xl-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; border: 0;">
                    <div class="card-body">
                        <h3 class="text-center" style="font-weight: bold;">Pilih Aksesbilitas</h3>
                        <div class="row mt-4" style="row-gap: 20px;">
                            <div class="col-xl-4">
                                <a href="<?= base_url('/login_staff'); ?>" style="text-decoration: none;">
                                    <div class="card">
                                        <div class="card-body p-0" style="height: 50vh;">
                                            <img src="<?= base_url('img/staff_ils.jpg'); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;" alt="">
                                        </div>
                                        <div class="card-footer text-light" style="background: navy;">
                                            <p class="text-center mb-0">Staff</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4">
                                <a href="<?= base_url('/login_pelatih'); ?>" style="text-decoration: none;">
                                    <div class="card">
                                        <div class="card-body p-0" style="height: 50vh;">
                                            <img src="<?= base_url('img/pelatih_ils.jpg'); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;" alt="">
                                        </div>
                                        <div class="card-footer text-light bg-info">
                                            <p class="text-center mb-0">Pelatih</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-4">
                                <a href="<?= base_url('/login_siswa'); ?>" style="text-decoration: none;">
                                    <div class="card">
                                        <div class="card-body p-0" style="height: 50vh;">
                                            <img src="<?= base_url('img/bg.png'); ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px 5px 0 0;" alt="">
                                        </div>
                                        <div class="card-footer text-light bg-secondary">
                                            <p class="text-center mb-0">Siswa</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('js/splash.js'); ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
</body>

</html>