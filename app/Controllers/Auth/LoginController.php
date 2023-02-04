<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\PelatihUsers;
use App\Models\SiswaUsers;
use App\Models\StaffUsers;

class LoginController extends BaseController
{
    public function login_staff()
    {
        $data = [
            'title' => 'Login Sebagai Staff'
        ];

        return view('global/auth/login_staff', $data);
    }

    public function login_pelatih()
    {
        $data = [
            'title' => 'Login Sebagai Pelatih'
        ];

        return view('global/auth/login_pelatih', $data);
    }

    public function login_siswa()
    {
        $data = [
            'title' => 'Login Sebagai Siswa'
        ];

        return view('global/auth/login_siswa', $data);
    }

    public function staff_login()
    {
        $staff_users = new StaffUsers();
        $user_id = $this->request->getVar('user_id');
        $password = $this->request->getVar('password');
        $staff = $staff_users->where(['user_id' => $user_id])->first();

        if ($staff) {
            if (password_verify($password, $staff['password'])) {
                session()->set([
                    'id' => $staff['id'],
                    'user_id' => $staff['user_id'],
                    'name' => $staff['name'],
                    'role' => $staff['role'],
                    'islogin' => TRUE,
                ]);
                return redirect()->to(base_url('/dash'));
            } else {
                session()->setFlashdata('err', 'NIP atau Password salah!');
                return redirect()->to(base_url('/login_staff'));
            }
        } else {
            session()->setFlashdata('err', 'NIP atau Password salah!');
            return redirect()->to(base_url('/login_staff'));
        }
    }

    public function pelatih_login()
    {
        $pelatih_users = new PelatihUsers();
        $user_id = $this->request->getVar('user_id');
        $password = $this->request->getVar('password');
        $pelatih = $pelatih_users->where(['user_id' => $user_id])->first();

        if ($pelatih) {
            if (password_verify($password, $pelatih['password'])) {
                session()->set([
                    'id' => $pelatih['id'],
                    'user_id' => $pelatih['user_id'],
                    'name' => $pelatih['name'],
                    'role' => $pelatih['role'],
                    'ekskul' => $pelatih['ekskul'],
                    'islogin' => TRUE,
                ]);
                return redirect()->to(base_url('/dash'));
            } else {
                session()->setFlashdata('err', 'NIP atau Password salah!');
                return redirect()->to(base_url('/login_pelatih'));
            }
        } else {
            session()->setFlashdata('err', 'NIP atau Password salah!');
            return redirect()->to(base_url('/login_pelatih'));
        }
    }

    public function siswa_login()
    {
        $siswa_users = new SiswaUsers();
        $user_id = $this->request->getVar('user_id');
        $password = $this->request->getVar('password');
        $siswa = $siswa_users->where(['user_id' => $user_id])->first();

        if ($siswa) {
            if (password_verify($password, $siswa['password'])) {
                session()->set([
                    'id' => $siswa['id'],
                    'user_id' => $siswa['user_id'],
                    'name' => $siswa['name'],
                    'role' => $siswa['role'],
                    'ekskul' => $siswa['ekskul'],
                    'islogin' => TRUE,
                ]);
                return redirect()->to(base_url('/dash'));
            } else {
                session()->setFlashdata('err', 'NIS atau Password salah!');
                return redirect()->to(base_url('/login_siswa'));
            }
        } else {
            session()->setFlashdata('err', 'NIS atau Password salah!');
            return redirect()->to(base_url('/login_siswa'));
        }
    }
}
