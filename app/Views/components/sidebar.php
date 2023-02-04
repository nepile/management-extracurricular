        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark <?php if (session('role') == 'siswa') : ?> bg-gradient-secondary <?php endif; ?> <?php if (session('role') == 'pelatih') : ?> bg-gradient-info <?php endif; ?> accordion" id="accordionSidebar" <?php if (session('role') == 'staff') : ?> style="background: navy;" <?php endif; ?>>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/dash'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SMP YANURI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($id_page == 1) : ?> active <?php endif; ?>">
                <a class="nav-link" href="<?= base_url('/dash'); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- menu khusus untuk siswa -->
            <?php if (session('role') == 'siswa') : ?>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Form
                </div>

                <li class="nav-item <?php if ($id_page == 2) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/pendaftaran_ekskul'); ?>">
                        <i class="fa fa-fw fa-print" aria-hidden="true"></i>
                        <span>Pendaftaran Ekskul</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- menu khusus staff -->
            <?php if (session('role') == 'staff') : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Informasi Umum
                </div>

                <li class="nav-item <?php if ($id_page == 3) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/informasi_ekskul'); ?>">
                        <i class="fa fa-fw fa-graduation-cap" aria-hidden="true"></i>
                        <span>Informasi Ekskul</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($id_page == 5) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/data_pelatih'); ?>">
                        <i class="fa fa-fw fa-user-md" aria-hidden="true"></i>
                        <span>Data Pelatih</span>
                    </a>
                </li>

                <li class="nav-item <?php if ($id_page == 6) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/data_siswa'); ?>">
                        <i class="fa fa-fw fa-users" aria-hidden="true"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Laporan
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item <?php if ($id_page == 7) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/laporan_presensi'); ?>">
                        <i class="fa fa-fw fa-check-square" aria-hidden="true"></i>
                        <span>Laporan Presensi</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('role') == 'staff' || session('role') == 'pelatih') : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Kegiatan
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item <?php if ($id_page == 8) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/kegiatan_ekskul'); ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Kegiatan Ekskul</span>
                    </a>
                </li>

            <?php endif; ?>

            <!-- menu khusu pelatih -->
            <?php if (session('role') == 'pelatih') : ?>
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Manajemen
                </div>

                <li class="nav-item <?php if ($id_page == 9) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/manajemen_ekskul'); ?>">
                        <i class="fa fa-fw fa-graduation-cap" aria-hidden="true"></i>
                        <span>Manajemen Ekskul</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('role') == 'pelatih' || session('role') == 'siswa') : ?>
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Presensi
                </div>

                <li class="nav-item <?php if ($id_page == 10) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/presensi'); ?>">
                        <i class="fa fa-fw <?php if (session('role') == 'pelatih') : ?> fa-user-md <?php else : ?> fa-user-check <?php endif ?>" aria-hidden="true"></i>
                        <span>Presensi <?= ucfirst(session('role')); ?></span></a>
                </li>
            <?php endif; ?>

            <?php if (session('role') == 'pelatih' || session('role') == 'staff') : ?>
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Penilaian
                </div>
                <li class="nav-item <?php if ($id_page == 12) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/penilaian_ekskul'); ?>">
                        <i class="fa fa-fw fa-star" aria-hidden="true"></i>
                        <span>Penilaian Ekskul</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (session('role') == 'pelatih' || session('role') == 'siswa') : ?>
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Settings
                </div>

                <li class="nav-item <?php if ($id_page == 11) : ?> active <?php endif; ?>">
                    <a class="nav-link" href="<?= base_url('/ubah_password'); ?>">
                        <i class="fa fa-fw fa-key" aria-hidden="true"></i>
                        <span>Ubah Password</span>
                    </a>
                </li>
            <?php endif; ?>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->