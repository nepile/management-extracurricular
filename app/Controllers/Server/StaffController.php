<?php

namespace App\Controllers\Server;

use App\Controllers\BaseController;
use App\Models\Ekskul;
use App\Models\PelatihUsers;
use App\Models\SiswaUsers;

class StaffController extends BaseController
{
    public function __construct()
    {
        $this->ekskul = new Ekskul();
        $this->pelatih = new PelatihUsers();
        $this->siswa = new SiswaUsers();
    }
    public function informasi_ekskul_store()
    {
        try {
            $this->ekskul->insert([
                'nama_ekskul' => $this->request->getVar('nama_ekskul'),
                'hari' => $this->request->getVar('hari'),
                'pukul' => $this->request->getVar('pukul'),
                'kuota' => $this->request->getVar('kuota'),
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan ekskul!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', '<strong>Ekskul duplikat!</strong> Ekskul yang diinput sudah ada didalam database sebelumnya!');
        }
    }

    public function informasi_ekskul_destroy($id)
    {
        $ekskul = $this->ekskul->find($id);
        if ($ekskul) {
            $this->ekskul->delete($id);
            return redirect()->back()->with('warning', 'Ekskul berhasil dihapus!');
        }
    }

    public function informasi_ekskul_update($id)
    {
        try {
            $this->ekskul->update($id, [
                'nama_ekskul' => $this->request->getVar('nama_ekskul'),
                'hari' => $this->request->getVar('hari'),
                'pukul' => $this->request->getVar('pukul'),
                'kuota' => $this->request->getVar('kuota'),
            ]);
            return redirect()->back()->with('success', 'Satu ekskul berhasil diupdate!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', '<strong>Ekskul atau Pelatih duplikat!</strong> Ekskul atau Pelatih yang diinput sudah ada didalam database sebelumnya!');
        }
    }

    // data pelatih
    public function data_pelatih_store()
    {
        try {
            $this->pelatih->insert([
                'name' => $this->request->getVar('name'),
                'user_id' => $this->request->getVar('user_id'),
                'password' => password_hash($this->request->getVar('user_id'), PASSWORD_DEFAULT),
                'role' => 'pelatih',
                'ekskul' => $this->request->getVar('ekskul'),
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan pelatih!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada data yang duplikat! pastikan NIP dan Ekskul setiap data berbeda!');
        }
    }

    public function data_pelatih_destroy($id)
    {
        $pelatih = $this->pelatih->find($id);
        if ($pelatih) {
            $this->pelatih->delete($id);
            return redirect()->back()->with('warning', 'Satu data pelatih berhasil dihapus!');
        }
    }

    public function data_pelatih_update($id)
    {
        try {
            $this->pelatih->update($id, [
                'name' => $this->request->getVar('name'),
                'user_id' => $this->request->getVar('user_id'),
                'ekskul' => $this->request->getVar('ekskul'),
            ]);

            return redirect()->back()->with('success', 'Satu pelatih berhasil diupdate!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada data yang duplikat! pastikan NIP dan Ekskul setiap data berbeda!');
        }
    }

    // data siswa
    public function data_siswa_store()
    {
        try {
            $this->siswa->insert([
                'name' => $this->request->getVar('name'),
                'user_id' => $this->request->getVar('user_id'),
                'password' => password_hash($this->request->getVar('user_id'), PASSWORD_DEFAULT),
                'role' => 'siswa',
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan siswa!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'NIS duplikat! NIS yang diinput sudah ada didalam database sebelumnya!');
        }
    }

    public function data_siswa_destroy($id)
    {
        $siswa = $this->siswa->find($id);
        if ($siswa) {
            $this->siswa->delete($id);
            return redirect()->back()->with('warning', 'Satu siswa berhasil dihapus!');
        }
    }

    public function data_siswa_update($id)
    {
        try {
            $this->siswa->update($id, [
                'name' => $this->request->getVar('name'),
                'user_id' => $this->request->getVar('user_id'),
            ]);
            return redirect()->back()->with('success', 'Satu siswa berhasil diupdate!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'NIS duplikat! NIS yang diinput sudah ada didalam database sebelumnya!');
        }
    }
}
