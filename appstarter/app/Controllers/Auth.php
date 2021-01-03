<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_User;
use App\Models\Model_Role;
use CodeIgniter\I18n\Time;

class Auth extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login | WARJAM Admin Page',
            'validation' => \Config\Services::validation()
        ];
        echo view('admin/pages/auth/login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function prosesLogin()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/login')->with('error', 'Mohon Masukkan Username dan Password dengan benar');
        } else {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $user = new Model_User();
            $users = $user->where('username', $username)->where('password', $password)->first();



            if ($users) {
                $user->save([
                    'user_id' => $users['user_id'],
                    'last_login_at' => Time::now(),
                ]);
                $data = [
                    'username' => $users['username'],
                    'nama_lengkap' => $users['nama_lengkap'],
                    'user_id' => $users['user_id'],
                    'role_id' => $users['role_id'],
                    'isLoggedIn' => true,
                ];
                session()->set($data);
                return redirect()->to('/admin');
            } else {
                return redirect()->to('/login')->with('error', 'Maaf Username / Password anda tidak benar');
            }
        }
    }

    public function profile()
    {
        $session = session();
        $user = new Model_User();
        $users = $user->where('user_id', $session->user_id)->first();
        $role = new Model_Role();
        $data = [
            'title' => 'Edit User| WARJAM Admin Page',
            'role' => $role->orderBy('role_id', 'ASC')->findAll(),
            'user' => $users,
        ];
        echo view('admin/pages/profil/edit', $data);
    }
    public function editProfile()
    {
        $id = session()->user_id;
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengguna Harus Diisi dengan Benar.',
                ],
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username,user_id,' . $id . ']',
                'errors' => [
                    'required' => 'Username Harus Diisi dengan Benar.',
                    'is_unique' => 'Username sudah digunakan pengguna lain.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/admin/user/edit-profile')->withInput()->with('error', $validation->getErrors());
        } else {
            $user = new Model_User();
            $user->save([
                'user_id' => $id,
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'username' => $this->request->getVar('username'),
            ]);
        }
        return redirect()->to('/admin/user/edit-profile')->with('success', 'Profil Anda Telah Berhasil Diperbaharui');
    }

    public function editPassword()
    {
        $user = new Model_User();
        $users = $user->where('user_id', session()->user_id)->first();
        $oldPass = $users['password'];

        if (!$this->validate([
            'old-password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Anda Harus Diisi dengan Benar.',
                ],
            ],
            'new-password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Baru Anda Harus Diisi dengan Benar.',
                ],
            ],
            'confirm-new-password' => [
                'rules' => 'required|matches[new-password]',
                'errors' => [
                    'required' => 'Password Anda Harus Diisi dengan Benar.',
                    'matches' => 'Kedua Password Baru Anda Tidak Cocok.'
                ],
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . '/admin/user/edit-profile')->with('error', $validation->getErrors());
        } else {
            if ($this->request->getVar('old-password') == $oldPass) {
                $user = new Model_User();
                $user->save([
                    'user_id' => session()->user_id,
                    'password' => $this->request->getVar('new-password'),
                ]);
            } else {
                $error = [
                    'old-password' => 'Password Lama Anda Salah',
                ];
                return redirect()->to(base_url() . '/admin/user/edit-profile')->with('error', $error);
            }
        }
        return redirect()->to('/admin/user/edit-profile')->with('Pass_success', 'Password Anda Telah Berhasil Diperbaharui');
    }
}
