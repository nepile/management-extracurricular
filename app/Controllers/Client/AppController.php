<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\Ekskul;
use App\Models\PendaftaranEkskul;
use App\Models\Presensi;
use App\Models\KegiatanEkskul;
use App\Models\PelatihUsers;
use App\Models\SiswaUsers;
use App\Models\StaffUsers;

class AppController extends BaseController
{
    public function __construct()
    {
        $this->pendaftaran_ekskul = new PendaftaranEkskul();
        $this->ekskul = new Ekskul();
        $this->staff = new StaffUsers();
        $this->pelatih = new PelatihUsers();
        $this->siswa = new SiswaUsers();
        $this->kegiatan_ekskul = new KegiatanEkskul();
        $this->presensi = new Presensi();
    }

    public function welcome()
    {
        $data = [
            'title' => 'Silakan Pilih Aksesbilitas',
        ];

        return view('welcome', $data);
    }

    public function dash()
    {
        $data = [
            'title' => 'Beranda',
            'id_page' => 1,
            'info_siswa' => $this->siswa->join('pendaftaran_ekskul', 'siswa_users.user_id=pendaftaran_ekskul.siswa_id', 'inner')->where('user_id', session('user_id'))->findAll(),
            'kegiatan_ekskul' => $this->kegiatan_ekskul->findAll(),
            'count_ekskul' => $this->ekskul->countAll(),
            'count_pelatih' => $this->pelatih->countAllResults(),
            'count_siswa' => $this->siswa->countAllResults(),
            'data_pelatih' => $this->pelatih->select(['user_id', 'name', 'ekskul'])->findAll(),
            'data_siswa' => $this->siswa->select(['user_id', 'name', 'ekskul'])->findAll(),
        ];

        return view('global/core/dash', $data);
    }

    public function pendaftaran_ekskul()
    {
        if (session()->get('role') != 'siswa') {
            return redirect()->back();
        }

        $data = [
            'title' => 'Pendaftaran Ekskul',
            'id_page' => 2,
            'siswa_id' => $this->pendaftaran_ekskul->select('siswa_id')->where('siswa_id', session('user_id'))->findAll(),
            'count_user_id' => $this->pendaftaran_ekskul->select('siswa_id')->where('siswa_id', session('user_id'))->countAllResults(),
            'ekskul' => $this->ekskul->select(['nama_ekskul', 'kuota'])->findAll(),
            'pendaftaran_ekskul' => $this->pendaftaran_ekskul->where('siswa_id', session('user_id'))->select('id_ekskul')->get()->getResultArray(),
        ];

        return view('global/core/pendaftaran_ekskul', $data);
    }

    public function informasi_ekskul()
    {
        if (session()->get('role') != 'staff') {
            return redirect()->back();
        }
        $data = [
            'title' => 'Informasi Ekskul',
            'id_page' => 3,
            'ekskul' => $this->ekskul->findAll(),
            'data_pelatih' => $this->pelatih->select(['name', 'user_id'])->findAll(),
        ];
        return view('global/core/informasi_ekskul', $data);
    }

    public function data_pelatih()
    {
        if (session()->get('role') != 'staff') {
            return redirect()->back();
        }
        $data = [
            'title' => 'Data Pelatih',
            'id_page' => 5,
            'data_pelatih' => $this->pelatih->select(['id', 'user_id', 'name', 'ekskul'])->findAll(),
            'data_ekskul' => $this->ekskul->select(['nama_ekskul'])->findAll()
        ];

        return view('global/core/data_pelatih', $data);
    }

    public function data_siswa()
    {
        if (session()->get('role') != 'staff') {
            return redirect()->back();
        }
        $data = [
            'title' => 'Data Siswa',
            'id_page' => 6,
            'data_siswa' => $this->siswa->select(['id', 'user_id', 'name', 'ekskul'])->findAll(),
        ];

        return view('global/core/data_siswa', $data);
    }

    public function laporan_presensi()
    {
        if (session()->get('role') != 'staff') {
            return redirect()->back();
        }
        $data = [
            'title' => 'Laporan Presensi',
            'id_page' => 7,
            'laporan_presensi' => $this->presensi->findAll(),
        ];

        return view('global/core/laporan_presensi', $data);
    }

    public function kegiatan_ekskul()
    {
        if (session()->get('role') == 'siswa') {
            return redirect()->back();
        }
        $data = [
            'title' => 'Kegiatan Ekskul',
            'id_page' => 8,
            'ekskul' => $this->ekskul->select('nama_ekskul')->findAll(),
            'kegiatan_ekskul' => $this->kegiatan_ekskul->findAll(),
        ];

        return view('global/core/kegiatan_ekskul', $data);
    }

    public function manajemen_ekskul()
    {
        if (session()->get('role') != 'pelatih') {
            return redirect()->back();
        }
        $data = [
            'title' => 'Manajemen Ekskul',
            'id_page' => 9,
            'pendaftaran_ekskul' => $this->pendaftaran_ekskul->join('siswa_users', 'pendaftaran_ekskul.siswa_id=siswa_users.user_id')->findAll(),
            'siswa' => $this->siswa->findAll(),
            'ekskul_wajib' => $this->siswa->findAll(),
        ];

        // var_dump($data['pendaftaran_ekskul']);
        // echo '<br><br>';
        return view('global/core/manajemen_ekskul', $data);
    }

    public function presensi()
    {
        if (session()->get('role') == 'staff') {
            return redirect()->back();
        }

        $data = [
            'title' => "Presensi " . ucfirst(session('role')),
            'id_page' => 10,
            'ekskul' => $this->ekskul->select(['nama_ekskul', 'hari', 'pukul'])->findAll()
        ];

        return view('global/core/presensi', $data);
    }

    public function presensi_store()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d', strtotime('now'));
        $db = \Config\Database::connect();
        $query = $db->table('presensi_ekskul')->select('COUNT(*) as count')->where('tgl_presensi', $date)->where('user_id', session('user_id'))->get();
        $res = $query->getRow();
        $presensi_user = $res->count;

        if ($presensi_user > 0) {
            return redirect()->back()->with('error', 'Anda sudah presensi hari ini!');
        } else {
            $this->presensi->insert([
                'user_id' => $this->request->getVar('user_id'),
                'name' => $this->request->getVar('name'),
                'ekskul' => $this->request->getVar('ekskul'),
                'role' => $this->request->getVar('role'),
                'tgl_presensi' => $date,
            ]);

            return redirect()->back()->with('success', 'Berhasil presensi!');
        }
    }

    public function ubah_password()
    {
        $data = [
            'title' => 'Ubah Password',
            'id_page' => 11,
        ];

        return view('global/auth/ubah_password', $data);
    }

    public function ubah_password_handle()
    {
        $current_password = $this->request->getVar('current_password');
        $password = $this->request->getVar('password');
        $confirm_password = $this->request->getVar('confirm_password');

        if ($password != $confirm_password) {
            session()->setFlashdata('error', 'Confirmation password not match.');
            return redirect()->back();
        }

        if (session()->get('role') == 'siswa') {
            $userModel = new SiswaUsers();
        } elseif (session()->get('role') == 'pelatih') {
            $userModel = new PelatihUsers();
        }

        $user = $userModel->where('id', session()->get('id'))->first();

        if (!password_verify($current_password, $user['password'])) {
            session()->setFlashdata('error', 'Current password is incorrect.');
            return redirect()->back();
        }

        $userModel->update(session()->get('id'), ['password' => password_hash($password, PASSWORD_DEFAULT)]);
        session()->setFlashdata('success', 'Password changed successfully.');
        return redirect()->back();
    }

    public function penilaian_ekskul()
    {
        $data = [
            'title' => 'Penilaian Ekskul',
            'id_page' => 12,
            'nilai' => $this->siswa->orderBy('name', 'ASC')->findAll(),
        ];

        return view('global/core/penilaian', $data);
    }

    public function penilaian_ekskul_handle($id)
    {
        if (isset($_POST['sangat_baik'])) {
            $this->siswa->update($id, [
                'nilai_ekskul' => 'A',
            ]);
            return redirect()->back()->with('success', "Berhasil memperbarui nilai menjadi <strong>A</strong>!");
        } elseif (isset($_POST['baik'])) {
            $this->siswa->update($id, [
                'nilai_ekskul' => 'B'
            ]);
            return redirect()->back()->with('success', "Berhasil memperbarui nilai menjadi <strong>B</strong>!");
        } elseif (isset($_POST['cukup'])) {
            $this->siswa->update($id, [
                'nilai_ekskul' => 'C'
            ]);
            return redirect()->back()->with('success', "Berhasil memperbarui nilai menjadi <strong>C</strong>!");
        } elseif (isset($_POST['kurang'])) {
            $this->siswa->update($id, [
                'nilai_ekskul' => 'D'
            ]);
            return redirect()->back()->with('success', "Berhasil memperbarui nilai menjadi <strong>D</strong>!");
        } elseif (isset($_POST['reset'])) {
            $this->siswa->update($id, [
                'nilai_ekskul' => null
            ]);

            return redirect()->back()->with('warning', "Berhasil <em><strong>reset</strong></em> nilai");
        }
    }
}
