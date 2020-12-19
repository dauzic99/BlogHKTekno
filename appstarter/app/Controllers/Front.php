<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_JenisMenu;
use App\Models\Model_Menu;

class Front extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'WARJAM Restorasi',
        ];
        echo view('front/pages/home', $data);
    }

    public function menu()
    {
        $jenis = new Model_JenisMenu();
        $menu = new Model_Menu();

        $type = $jenis->findAll();
        $data = [
            'title' => 'Menu | WARJAM Restorasi',
            'jenis' => $type,
        ];
        echo view('front/pages/menu', $data);
    }
}
