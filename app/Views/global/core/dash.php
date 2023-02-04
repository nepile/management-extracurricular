<?= $this->extend('layouts/app'); ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold d-xl-none d-inline-block"><?= $title; ?></h1>
    </div>

    <?= $this->include('components/alert'); ?>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow">
                <div class="card-header <?php if (session('role') == 'siswa') : ?> bg-secondary <?php endif; ?> <?php if (session('role') == 'pelatih') : ?> bg-info <?php endif; ?>" <?php if (session('role') == 'staff') : ?> style="background: navy;" <?php endif; ?>>
                    <span class="text-light font-weight-bold">
                        Profil Diri
                    </span>
                </div>
                <div class="card-body d-flex align-items-center p-0">
                    <div class="col-3 p-1" style="height: 35vh;">
                        <img src="<?= base_url('img/profil.png'); ?>" style="width: 100%; height: 100%; object-fit: contain;" alt="">
                    </div>
                    <div class="col-9">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tr>
                                    <th>Nama</th>
                                    <td>
                                        <p class="mb-0">
                                            <?= session('name'); ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>NIS/NIP</th>
                                    <td>
                                        <p class="mb-0">
                                            <?= session('user_id'); ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>
                                        <p class="mb-0">
                                            <?php if (session('role') == 'siswa') : ?>
                                                <span class="px-3 bg-secondary text-light" style="border-radius: 20px;">
                                                    <?= ucfirst(session('role')); ?>
                                                </span>
                                            <?php elseif (session('role') == 'pelatih') : ?>
                                                <span class="px-3 bg-info text-light" style="border-radius: 20px;">
                                                    <?= ucfirst(session('role')); ?>
                                                </span>
                                            <?php elseif (session('role') == 'staff') : ?>
                                                <span class="px-3 text-light" style="border-radius: 20px; background: navy;">
                                                    <?= ucfirst(session('role')); ?>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mt-3 mt-xl-0">
            <div class="card shadow">
                <div class="card-header <?php if (session('role') == 'siswa') : ?> bg-secondary <?php endif; ?> <?php if (session('role') == 'pelatih') : ?> bg-info <?php endif; ?>" <?php if (session('role') == 'staff') : ?> style="background: navy;" <?php endif; ?>>
                    <span class="text-light font-weight-bold">
                        Info Sekilasi
                    </span>
                </div>

                <div class="mx-3 mt-3">
                    <h3 class="font-weight-bold">Akumulasi Data</h3>
                    <p class="mb-0">
                        Data dibawah merupakan akumulasi dari inputan staff.
                    </p>
                </div>

                <div class="row align-items-center justify-content-center" style="flex-wrap: wrap;">
                    <div class="card-body d-flex flex-column flex-xl-row align-items-center p-3">
                        <div class="col-12 col-xl-4">
                            <div class="card bg-success mt-2 mt-xl-0 text-light p-2 shadow">
                                <p class="font-weight-bold text-center">
                                    Ekskul
                                </p>

                                <h1 class="text-center font-weight-bold">
                                    <?= $count_ekskul; ?>
                                </h1>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card bg-info text-light mt-2 mt-xl-0 p-2 shadow">
                                <p class="font-weight-bold text-center">
                                    Pelatih
                                </p>

                                <h1 class="text-center font-weight-bold">
                                    <?= $count_pelatih; ?>

                                </h1>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="card bg-danger text-light mt-2 mt-xl-0 p-2 shadow">
                                <p class="font-weight-bold text-center">
                                    Siswa
                                </p>

                                <h1 class="text-center font-weight-bold">
                                    <?= $count_siswa; ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (session('role') == 'siswa') : ?>
        <div class="row my-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <span class="text-light font-weight-bold">Ekskulku</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Ekskul</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Pendaftaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($info_siswa as $item) : ?>
                                        <tr class="text-center">
                                            <td><?= $no++ . '.'; ?></td>
                                            <td><?= $item['id_ekskul']; ?></td>
                                            <td>
                                                <?php if ($item['ekskul'] != null && $item['id_ekskul'] == $item['ekskul']) : ?>
                                                    <span class="px-3 text-light bg-success" style="border-radius: 20px;">
                                                        Diterima
                                                    </span>
                                                <?php else : ?>
                                                    <?php if ($item['ekskul'] != null) : ?>
                                                        <span class="px-3 text-light bg-danger" style="border-radius: 20px;">
                                                            Gagal
                                                        </span>
                                                    <?php else : ?>
                                                        <span class="px-3 text-light bg-secondary" style="border-radius: 20px;">
                                                            Belum dikonfirmasi
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $item['created_at']; ?></td>
                                        </tr>
                                    <?php endforeach;  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session('role') == 'staff') : ?>
        <div class="row my-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header" style="background: navy;">
                        <span class="text-light font-weight-bold">Daftar Seluruh Users</span>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">NIP</th>
                                                <th class="text-center">Nama Lengkap</th>
                                                <th class="text-center">Ekskul</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($data_pelatih as $item) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $item['user_id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td><?= $item['ekskul']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">NIP</th>
                                                <th class="text-center">Nama Lengkap</th>
                                                <th class="text-center">Ekskul</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($data_siswa as $item) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $item['user_id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td>
                                                        <?php if ($item['ekskul'] == null) : ?>
                                                            <span class="text-danger" style="font-weight: bold;">Belum Ada</span>
                                                        <?php else : ?>
                                                            <span><?= $item['ekskul']; ?></span>
                                                        <?php endif; ?>
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
        </div>
    <?php endif; ?>

    <?php if (session('role') == 'pelatih') : ?>
        <div class="row my-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <span class="text-light font-weight-bold">Daftar Progress Ekskul</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Ekskul</th>
                                        <th class="text-center">Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kegiatan_ekskul as $item) : ?>
                                        <?php if ($item['ekskul'] == session()->get('ekskul')) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ . '.'; ?></td>
                                                <td><?= $item['ekskul']; ?></td>
                                                <td><?= $item['kegiatan']; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


<?= $this->endSection(); ?>