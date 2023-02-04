<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <?= $this->include('components/alert'); ?>
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Transkip nilai ekskul <strong><?= session('ekskul'); ?></strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead class="table-success text-dark">
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Ekskul</th>
                                    <th class="text-center">Nilai</th>
                                    <?php if (session()->get('role') == 'pelatih') : ?>
                                        <td class="text-center">Handle</td>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($nilai as $item) : ?>
                                    <?php if (session()->get('role') == 'pelatih') : ?>
                                        <?php if ($item['ekskul'] == session()->get('ekskul')) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ . '.'; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td><?= $item['user_id']; ?></td>
                                                <td><?= $item['ekskul']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($item['nilai_ekskul'] == null) : ?>
                                                        <span class="text-center mb-0" style="font-weight: bold;">-</span>
                                                    <?php elseif ($item['nilai_ekskul'] == 'A') : ?>
                                                        <span class="px-3 bg-success text-light" style="border-radius: 25px;">Sangat Baik</span>

                                                    <?php elseif ($item['nilai_ekskul'] == 'B') : ?>
                                                        <span class="px-3 bg-primary text-light" style="border-radius: 25px;">Baik</span>


                                                    <?php elseif ($item['nilai_ekskul'] == 'C') : ?>
                                                        <span class="px-3 bg-warning text-light" style="border-radius: 25px;">Cukup</span>

                                                    <?php elseif ($item['nilai_ekskul'] == 'D') : ?>
                                                        <span class="px-3 bg-danger text-light" style="border-radius: 25px;">Kurang</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-star"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form action="<?= base_url('/penilaian_ekskul/' . $item['id']); ?>" method="post">
                                                                <button name="sangat_baik" class="dropdown-item text-success">Sangat Baik</button>
                                                                <button name="baik" class="dropdown-item text-primary">Baik</button>
                                                                <button name="cukup" class="dropdown-item text-warning">Cukup</button>
                                                                <button name="kurang" class="dropdown-item text-danger">Kurang</button>
                                                                <?php if ($item['nilai_ekskul'] != null) : ?>
                                                                    <button name="reset" class="dropdown-item text-secondary">Reset Nilai</button>
                                                                <?php endif; ?>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>

                                    <?php elseif (session()->get('role') == 'staff') : ?>
                                        <?php if ($item['nilai_ekskul'] != null && $item['ekskul'] != null) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ . '.'; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td><?= $item['user_id']; ?></td>
                                                <td><?= $item['ekskul']; ?></td>
                                                <td class="text-center">
                                                    <?php if ($item['nilai_ekskul'] == null) : ?>
                                                        <span class="text-center mb-0" style="font-weight: bold;">-</span>
                                                    <?php elseif ($item['nilai_ekskul'] == 'A') : ?>
                                                        <span class="px-3 bg-success text-light" style="border-radius: 25px;">Sangat Baik</span>
                                                    <?php elseif ($item['nilai_ekskul'] == 'B') : ?>
                                                        <span class="px-3 bg-primary text-light" style="border-radius: 25px;">Baik</span>
                                                    <?php elseif ($item['nilai_ekskul'] == 'C') : ?>
                                                        <span class="px-3 bg-warning text-light" style="border-radius: 25px;">Cukup</span>
                                                    <?php elseif ($item['nilai_ekskul'] == 'D') : ?>
                                                        <span class="px-3 bg-danger text-light" style="border-radius: 25px;">Kurang</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPenilaian" tabindex="-1" role="dialog" aria-labelledby="addPenilaianLabel" aria-hidden="true">
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

            <form action="<?= base_url('/penilaian_ekskul/store'); ?>" method="POST">
                <div class="modal-body">
                    <?= csrf_field(); ?>

                    <div class="mt-2">
                        <label class="mb-0 text-dark" for="tautan">Tautan SpreadSheet:</label>
                        <input type="text" name="tautan" id="tautan" class="form-control" placeholder="Link Nilai Ekskul <?= session('ekskul'); ?>">
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

<?= $this->endSection(); ?>