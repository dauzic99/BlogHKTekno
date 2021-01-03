<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_User;
use App\Models\Model_Role;

class Pegawai extends Controller
{

    public function index()
    {
        $user = new Model_User();
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select('*');
        $builder->join('role', 'role.role_id = user.role_id');
        $query = $builder->get();

        $data = [
            'title' => 'Menu | WARJAM Admin Page',
            'pegawai' => $query,
        ];


        echo view('admin/pages/pegawai/index', $data);
    }

    public function create()
    {

        $role = new Model_Role();
        $data = [
            'title' => 'Create Pegawai| WARJAM Admin Page',
            'role' => $role->orderBy('role_id', 'ASC')->findAll(),
        ];

        return view('admin/pages/pegawai/create', $data);
    }

    public function edit($id)
    {
        $user = new Model_User();
        $users = $user->where('user_id', $id)->first();
        $role = new Model_Role();
        $data = [
            'title' => 'Edit User| WARJAM Admin Page',
            'role' => $role->orderBy('role_id', 'ASC')->findAll(),
            'user' => $users,
        ];
        echo view('admin/pages/pegawai/edit', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pegawai Harus Diisi dengan Benar.',
                ],
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username Harus Diisi dengan Benar.',
                    'is_unique' => 'Username sudah digunakan pegawai lain.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus Diisi dengan Benar.',
                ],
            ],
            'role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Harus Dipilih dengan Benar.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/admin/pegawai/create')->withInput()->with('error', $validation->getErrors());
        } else {
            $user = new Model_User();
            $user->save([
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role_id' => $this->request->getVar('role_id'),
            ]);
        }
        return redirect()->to('/admin/pegawai/');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pegawai Harus Diisi dengan Benar.',
                ],
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username,user_id,' . $id . ']',
                'errors' => [
                    'required' => 'Username Harus Diisi dengan Benar.',
                    'is_unique' => 'Username sudah digunakan pegawai lain.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Harus Diisi dengan Benar.',
                ],
            ],
            'role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Harus Dipilih dengan Benar.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/admin/pegawai/edit')->withInput()->with('error', $validation->getErrors());
        } else {
            $user = new Model_User();
            $user->save([
                'user_id' => $id,
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'role_id' => $this->request->getVar('role_id'),
            ]);
        }
        return redirect()->to('/admin/pegawai/');
    }

    public function delete()
    {
        $user = new Model_User();

        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            if ($user->delete($id)) {
                $msg = [
                    'sukses' => 'Data berhasil dihapus'
                ];
            }
            echo json_encode($msg);
        }
    }
}
