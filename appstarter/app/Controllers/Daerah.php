<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Daerah;

class Daerah extends Controller
{

    public function index()
    {
        $daerah = new Model_Daerah();
        $data = [
            'title' => 'Menu | WARJAM Admin Page',
            'daerah' => $daerah->orderBy('daerah_id', 'ASC')->findAll(),
        ];
        echo view('admin/pages/daerah/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Daerah| WARJAM Admin Page',
        ];
        echo view('admin/pages/daerah/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nama_daerah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Daerah Harus Diisi dengan Benar.',
                ],
            ],
            'ongkos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ongkos Harus Diisi dengan Benar.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/admin/daerah/create')->withInput()->with('error', $validation->getErrors());
        } else {
            $daerah = new Model_Daerah();
            $slug = $this->generate_url_slug($this->request->getVar('nama_daerah'), 'daerah', 'slug_daerah');
            $daerah->save([
                'nama_daerah' => $this->request->getVar('nama_daerah'),
                'ongkos' => $this->request->getVar('ongkos'),
                'slug_daerah' => $slug,
            ]);
        }

        return redirect()->to('/admin/daerah');
    }

    public function edit($slug)
    {
        $daerah = new Model_Daerah();
        $zone = $daerah->where('slug_daerah', $slug)->first();
        $data = [
            'title' => 'Edit Daerah| WARJAM Admin Page',
            'daerah' => $zone,
        ];
        echo view('admin/pages/daerah/edit', $data);
    }

    public function update($id)
    {
        //validasi
        if (!$this->validate([
            'nama_daerah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Daerah Harus Diisi dengan Benar.',
                ],
            ],
            'ongkos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ongkos Harus Diisi dengan Benar.',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        } else {
            $jenis = new Model_Daerah();
            $slug = $this->generate_url_slug($this->request->getVar('nama_daerah'), 'daerah', 'slug_daerah');
            $jenis->save([
                'daerah_id' => $id,
                'nama_daerah' => $this->request->getVar('nama_daerah'),
                'ongkos' => $this->request->getVar('ongkos'),
                'slug_daerah' => $slug,
            ]);
        }

        return redirect()->to('/admin/daerah');
    }

    public function delete()
    {
        $daerah = new Model_Daerah();

        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            if ($daerah->delete($id)) {
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
        $builder = $db->table('daerah');
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key) $params["$key !="] = $value;
        while ($builder->where('slug_daerah', $slug)->countAllResults()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params[$field] = $slug;
        }
        return $slug;
    }
}
