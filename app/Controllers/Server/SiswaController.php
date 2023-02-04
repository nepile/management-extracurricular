<?php

namespace App\Controllers\Server;

use App\Controllers\BaseController;
use App\Models\Ekskul;
use App\Models\PendaftaranEkskul;

class SiswaController extends BaseController
{
    public function __construct()
    {
        $this->pendaftaran_ekskul = new PendaftaranEkskul();
        $this->ekskul = new Ekskul();
    }

    public function pendaftaran_ekskul_store()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $ekskul = $this->pendaftaran_ekskul->where('siswa_id', session('user_id'))->select('id_ekskul')->get()->getResultArray();

        if (count($ekskul) == 0) {
            $this->pendaftaran_ekskul->join('ekskul', 'ekskul.nama_ekskul=pendaftaran_ekskul.id_ekskul')->insert([
                'siswa_id' => $this->request->getVar('siswa_id'),
                'name' => $this->request->getVar('name'),
                'id_ekskul' => $this->request->getVar('id_ekskul'),
                'created_at' => $date,
                'kuota' => $this->ekskul->kurangKuota($this->request->getVar('id_ekskul'))
            ]);
            return redirect()->to(base_url('/dash'))->with('success', 'Berhasil mendaftar ekskul!');
        } else {
            if ($ekskul[0]['id_ekskul'] != $this->request->getVar('id_ekskul')) {
                $this->pendaftaran_ekskul->join('ekskul', 'ekskul.nama_ekskul=pendaftaran_ekskul.id_ekskul')->insert([
                    'siswa_id' => $this->request->getVar('siswa_id'),
                    'name' => $this->request->getVar('name'),
                    'id_ekskul' => $this->request->getVar('id_ekskul'),
                    'created_at' => $date,
                    'kuota' => $this->ekskul->kurangKuota($this->request->getVar('id_ekskul'))
                ]);
                return redirect()->to(base_url('/dash'))->with('success', 'Berhasil mendaftar ekskul!');
            } else {
                return redirect()->to(base_url('/dash'))->with('error', 'Gagal mendaftarkan ekskul! kamu sudah mendaftarkan ekskul ini sebelumnya!');
            }
        }
    }
}
