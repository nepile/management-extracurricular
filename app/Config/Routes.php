<?php

namespace Config;

use App\Controllers\Client\AppController as App;
use App\Controllers\Server\StaffController as Staff;
use App\Controllers\Server\PelatihController as Pelatih;
use App\Controllers\Server\SiswaController as Siswa;
use App\Controllers\Auth\LoginController as Login;
use App\Controllers\Auth\LogoutController as Logout;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance incprease by specifying the default
// route since we don't have to scan directories.

// authentication
$routes->get('/', [App::class, 'welcome']);
$routes->get('/login_staff', [Login::class, 'login_staff']);
$routes->get('/login_pelatih', [Login::class, 'login_pelatih']);
$routes->get('/login_siswa', [Login::class, 'login_siswa']);
$routes->post('/staff_login', [Login::class, 'staff_login']);
$routes->post('/pelatih_login', [Login::class, 'pelatih_login']);
$routes->post('/siswa_login', [Login::class, 'siswa_login']);
$routes->post('/logout', [Logout::class, 'handle_logout']);

$routes->get('/dash', [App::class, 'dash']);

$routes->get('/informasi_ekskul', [App::class, 'informasi_ekskul']);
$routes->post('/informasi_ekskul/store', [Staff::class, 'informasi_ekskul_store']);
$routes->post('/informasi_ekskul/destroy/(:num)', [Staff::class, 'informasi_ekskul_destroy']);
$routes->post('/informasi_ekskul/update/(:num)', [Staff::class, 'informasi_ekskul_update']);

$routes->get('/data_pelatih', [App::class, 'data_pelatih']);
$routes->post('/data_pelatih/store', [Staff::class, 'data_pelatih_store']);
$routes->post('/data_pelatih/destroy/(:num)', [Staff::class, 'data_pelatih_destroy']);
$routes->post('/data_pelatih/update/(:num)', [Staff::class, 'data_pelatih_update']);

$routes->get('/data_siswa', [App::class, 'data_siswa']);
$routes->post('/data_siswa/store', [Staff::class, 'data_siswa_store']);
$routes->post('/data_siswa/destroy/(:num)', [Staff::class, 'data_siswa_destroy']);
$routes->post('/data_siswa/update/(:num)', [Staff::class, 'data_siswa_update']);

$routes->get('/laporan_presensi', [App::class, 'laporan_presensi']);

$routes->get('/kegiatan_ekskul', [App::class, 'kegiatan_ekskul']);
$routes->post('/kegiatan_ekskul/store', [Pelatih::class, 'kegiatan_ekskul_store']);
$routes->post('/kegiatan_ekskul/update/(:num)', [Pelatih::class, 'kegiatan_ekskul_update']);

$routes->get('/manajemen_ekskul', [App::class, 'manajemen_ekskul']);
$routes->post('/manajemen_ekskul/diterima/(:num)', [Pelatih::class, 'manajemen_ekskul_diterima']);
$routes->post('/manajemen_ekskul/ditolak/(:num)', [Pelatih::class, 'manajemen_ekskul_ditolak']);

$routes->get('/pendaftaran_ekskul', [App::class, 'pendaftaran_ekskul']);
$routes->post('/pendaftaran_ekskul/store', [Siswa::class, 'pendaftaran_ekskul_store']);
$routes->get('/presensi', [App::class, 'presensi']);
$routes->post('/presensi/store', [App::class, 'presensi_store']);

$routes->get('/penilaian_ekskul', [App::class, 'penilaian_ekskul']);
$routes->post('/penilaian_ekskul/(:num)', [App::class, 'penilaian_ekskul_handle']);
$routes->get('/ubah_password', [App::class, 'ubah_password']);
$routes->post('/ubah_password', [App::class, 'ubah_password_handle']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
