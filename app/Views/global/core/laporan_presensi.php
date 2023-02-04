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

    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                <div class="card-header text-light font-weight-bold" style="background: #000b;">
                    Rekapan Laporan Presensi
                </div>
                <div class="card-body">
                    <div class="table-resposinve">
                        <table class="table table-bordered" id="dataTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>NIS/NIP</th>
                                    <th>Nama</th>
                                    <th>Ekskul</th>
                                    <th>Role</th>
                                    <th>Tanggal Presensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($laporan_presensi as $item) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $item['user_id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= $item['ekskul']; ?></td>
                                        <td><?= $item['role']; ?></td>
                                        <td><?= $item['tgl_presensi']; ?></td>
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


<?= $this->endSection(); ?>