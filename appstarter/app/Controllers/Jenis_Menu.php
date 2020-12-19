<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_JenisMenu;
use App\Models\Model_Menu;

class Jenis_Menu extends Controller
{

    public function index()
    {
        $jenis = new Model_JenisMenu();
        $data = [
            'title' => 'Menu | WARJAM Admin Page',
            'jenis' => $jenis->orderBy('jenis_menu_id', 'ASC')->findAll(),
        ];
        echo view('admin/pages/jenis_menu/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Menu Type| WARJAM Admin Page',
        ];
        echo view('admin/pages/jenis_menu/create', $data);
    }

    public function edit($slug)
    {
        $jenis = new Model_JenisMenu();
        $jenis_menu = $jenis->where('slug_jenis', $slug)->first();
        $data = [
            'title' => 'Create Menu Type| WARJAM Admin Page',
            'jenis' => $jenis_menu,
        ];
        echo view('admin/pages/jenis_menu/edit', $data);
    }

    public function save()
    {
        $jenis = new Model_JenisMenu();
        $slug = $this->generate_url_slug($this->request->getVar('nama_jenis'), 'jenis_menu', 'slug_jenis');
        $jenis->save([
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'slug_jenis' => $slug,
        ]);
        return redirect()->to('/admin/menu');
    }

    public function update($id)
    {
        $jenis = new Model_JenisMenu();
        $slug = $this->generate_url_slug($this->request->getVar('nama_jenis'), 'jenis_menu', 'slug_jenis');
        $jenis->save([
            'jenis_menu_id' => $id,
            'nama_jenis' => $this->request->getVar('nama_jenis'),
            'slug_jenis' => $slug,
        ]);
        return redirect()->to('/admin/menu');
    }

    public function delete()
    {
        $jenis = new Model_JenisMenu();
        $menu = new Model_Menu();

        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $type = $jenis->find($id);
            if ($jenis->delete($id)) {
                $menu->where('jenis_menu_id', $this->request->getVar('id'))->delete();
                helper('filesystem');
                delete_files('image/menu/' . $type['slug_jenis'], true); // delete all files/folders
                rmdir('image/menu/' . $type['slug_jenis']); // delete all files/folders
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
        $builder = $db->table('jenis_menu');
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
