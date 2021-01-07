<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_SecretJenis;
use App\Models\Model_SecretMenu;

class Secret_Jenis extends Controller
{
    public function index()
    {
        $jenis = new Model_SecretJenis();
        $data = [
            'title' => 'Secret Menu | WARJAM Admin Page',
            'jenis' => $jenis->orderBy('secret_jenis_menu_id', 'ASC')->findAll(),
        ];
        echo view('admin/pages/secret/jenis_menu/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create Menu Type| WARJAM Admin Page',
        ];
        echo view('admin/pages/secret/jenis_menu/create', $data);
    }

    public function save()
    {
        $jenis = new Model_SecretJenis();
        $slug = $this->generate_url_slug($this->request->getVar('nama_jenis'), 'jenis_menu', 'slug_jenis');
        $jenis->save([
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'slug_jenis' => $slug,
        ]);
        return redirect()->to('/admin/secret-menu');
    }

    public function edit($slug)
    {
        $jenis = new Model_SecretJenis();
        $jenis_menu = $jenis->where('slug_jenis', $slug)->first();
        $data = [
            'title' => 'Create Menu Type| WARJAM Admin Page',
            'jenis' => $jenis_menu,
        ];
        echo view('admin/pages/secret/jenis_menu/edit', $data);
    }

    public function update($id)
    {
        $jenis = new Model_SecretJenis();
        $slug = $this->generate_url_slug($this->request->getVar('nama_jenis'), 'jenis_menu', 'slug_jenis');
        $jenis->save([
            'secret_jenis_menu_id' => $id,
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'slug_jenis' => $slug,
        ]);
        return redirect()->to('/admin/secret-menu');
    }

    public function delete()
    {
        $jenis = new Model_SecretJenis();
        $menu = new Model_SecretMenu();

        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $type = $jenis->find($id);
            if ($jenis->delete($id)) {
                $menu->where('secret_jenis_menu_id', $id)->delete();
                helper('filesystem');
                delete_files('image/secret-menu/' . $type['slug_jenis'], true); // delete all files/folders
                rmdir('image/secret-menu/' . $type['slug_jenis']); // delete all files/folders
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
        $builder = $db->table('secret_jenis_menu');
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key) $params["$key !="] = $value;
        while ($builder->where('slug_jenis', $slug)->countAllResults()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }
}
