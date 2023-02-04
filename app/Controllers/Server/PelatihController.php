<?php

namespace App\Controllers\Server;

use App\Controllers\BaseController;
use App\Models\Ekskul;
use App\Models\PendaftaranEkskul;
use App\Models\KegiatanEkskul;
use App\Models\SiswaUsers;

class PelatihController extends BaseController
{
    public function __construct()
    {
        $this->kegiatan_ekskul = new KegiatanEkskul();
        $this->pendaftaran_ekskul = new PendaftaranEkskul();
        $this->ekskul = new Ekskul();
        $this->siswa = new SiswaUsers();
    }

    public function kegiatan_ekskul_store()
    {
        $this->kegiatan_ekskul->insert([
            'ekskul' => $this->request->getVar('ekskul'),
            'kegiatan' => $this->request->getVar('kegiatan'),
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan kegiatan ekskul');
    }

    public function kegiatan_ekskul_update($id)
    {
        $this->kegiatan_ekskul->update($id, [
            'ekskul' => $this->request->getVar('ekskul'),
            'kegiatan' => $this->request->getVar('kegiatan'),
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan kegiatan ekskul');
    }

    public function manajemen_ekskul_diterima($id)
    {
        $this->siswa->update($id, [
            'ekskul' => $this->request->getVar('ekskul'),
        ]);

        return redirect()->back()->with('success', 'Berhasil menerima siswa masuk ke dalam ekskul anda!');
    }

    public function manajemen_ekskul_ditolak($id)
    {
        $pendaftaran_ekskul = $this->pendaftaran_ekskul->join('ekskul', 'ekskul.nama_ekskul=pendaftaran_ekskul.id_ekskul')->find($id);

        if ($pendaftaran_ekskul) {
            $this->pendaftaran_ekskul->delete($id);
            $this->ekskul->tambahKuota($this->request->getVar('ekskul'));
            return redirect()->back()->with('warning', 'Satu siswa berhasil ditolak dari ekskul anda!');
        }
    }
}
