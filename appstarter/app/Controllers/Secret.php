<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_SecretJenis;
use App\Models\Model_SecretMenu;

use CodeIgniter\I18n\Time;

class Secret extends Controller
{
    public function index($slug)
    {
        $menu = new Model_SecretMenu();
        $jenis = new Model_SecretJenis();
        $jenis_menu = $jenis->where('slug_jenis', $slug)->first();
        $index = $menu->where('secret_jenis_menu_id', $jenis_menu['secret_jenis_menu_id'])->orderBy('secret_id', 'ASC')->findAll();
        $data = [
            'title' => 'Secret Menu | WARJAM Admin Page',
            'menu' => $index,
            'jenis_menu' => $jenis_menu,
        ];
        echo view('admin/pages/secret/menu/index', $data);
    }

    public function create($slug)
    {
        $jenis = new Model_SecretJenis();
        $jenis_menu = $jenis->where('slug_jenis', $slug)->first();
        $data = [
            'title' => 'Create Secret Menu| WARJAM Admin Page',
            'jenis_menu' => $jenis_menu,
        ];
        echo view('admin/pages/secret/menu/create', $data);
    }

    public function save()
    {
        $jenis = new Model_SecretJenis();
        $menu = new Model_SecretMenu();
        $folder = $jenis->where('secret_jenis_menu_id', $this->request->getVar('secret_jenis_menu_id'))->first();

        //validasi
        if (!$this->validate([
            'nama_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Secret Menu Harus Diisi dengan Benar.',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Harus Diisi dengan Benar.',
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Harus Diisi dengan Benar.',
                ],
            ],
            'foto' => [
                'rules' => 'uploaded[foto]',
                'errors' => [
                    'uploaded' => 'Foto Harus Diupload dengan Benar.',

                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/admin/secret-menu/' . $folder['slug_jenis'] . '/create')->withInput()->with('error', $validation->getErrors());
        } else {
            $slug = $this->generate_url_slug($this->request->getVar('nama_menu'), 'menu', 'slug_menu');

            //ambil gambar
            $gambarMenu = $this->request->getFile('foto');
            $newName = $slug . '' . $gambarMenu->getRandomName();
            $gambarMenu->move('image/secret-menu/' . $folder['slug_jenis'], $newName);

            $menu->save([
                'nama_menu' => $this->request->getVar('nama_menu'),
                'slug_menu' => $slug,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'harga' => $this->request->getVar('harga'),
                'foto' => $newName,
                'secret_jenis_menu_id' => $this->request->getVar('secret_jenis_menu_id'),
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]);
        }
        return redirect()->to('/admin/secret-menu/' . $folder['slug_jenis']);
    }

    public function edit($slug_jenis, $slug_menu)
    {
        $jenis = new Model_SecretJenis();
        $jenis_menu = $jenis->where('slug_jenis', $slug_jenis)->first();
        $menu = new Model_SecretMenu();
        $menus = $menu->where('slug_menu', $slug_menu)->first();
        $data = [
            'title' => 'Edit Secret Menu | WARJAM Admin Page',
            'jenis' => $jenis_menu,
            'menu' => $menus,
        ];
        echo view('admin/pages/secret/menu/edit', $data);
    }

    public function update($id_jenis, $id_menu)
    {
        $jenis = new Model_SecretJenis();
        $menu = new Model_SecretMenu();
        $menus = $menu->find($id_menu);
        $type = $jenis->where('secret_jenis_menu_id', $id_jenis)->first();
        $slug_jenis = $type['slug_jenis'];
        $slug = $this->generate_url_slug($this->request->getVar('nama_menu'), 'menu', 'slug_menu');
        //validasi
        if (!$this->validate([
            'nama_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Menu Harus Diisi dengan Benar.',
                ],
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Harus Diisi dengan Benar.',
                ],
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Harus Diisi dengan Benar.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        } else {
            if ($this->request->getFile('foto')->isReadable()) {
                //hapus file gambar sebelumnya di directory
                $path = 'image/secret-menu/' . $type['slug_jenis'] . '/' . $menus['foto'];
                unlink($path);

                $folder = $jenis->where('secret_jenis_menu_id', $id_jenis)->first();
                //ambil gambar
                $gambarMenu = $this->request->getFile('foto');
                $newName = $slug . '' . $gambarMenu->getRandomName();
                $gambarMenu->move('image/secret-menu/' . $folder['slug_jenis'], $newName);

                $menu->save([
                    'secret_id' => $id_menu,
                    'secret_jenis_menu_id' => $id_jenis,
                    'nama_menu' => $this->request->getVar('nama_menu'),
                    'slug_menu' => $slug,
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'harga' => $this->request->getVar('harga'),
                    'foto' => $newName,
                    'updated_at' => Time::now(),
                ]);
            } else {
                $menu->save([
                    'secret_id' => $id_menu,
                    'secret_jenis_menu_id' => $id_jenis,
                    'nama_menu' => $this->request->getVar('nama_menu'),
                    'slug_menu' => $slug,
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'harga' => $this->request->getVar('harga'),
                    'updated_at' => Time::now(),
                ]);
            }
        }


        return redirect()->to('/admin/secret-menu/' . $slug_jenis);
    }

    public function delete()
    {
        $jenis = new Model_SecretJenis();
        $menu = new Model_SecretMenu();


        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $menus = $menu->find($id);
            //get image file
            $path = 'image/secret-menu/' . $this->request->getVar('jenis') . '/' . $menus['foto'];
            if ($menu->delete($id)) {
                unlink($path);
                $msg = [
                    'sukses' => 'Data berhasil dihapus'
                ];
            }
            echo json_encode($msg);
        }
    }

    function generate_url_slug($string, $table, $field, $key = NULL, $value = NULL)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('secret_menu');
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key) $params["$key !="] = $value;
        while ($builder->where('slug_menu', $slug)->countAllResults()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }
}
