<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_JenisMenu;
use App\Models\Model_Menu;
use App\Models\Model_Contact;

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

    public function contact()
    {
        $contact = new Model_Contact();
        $kontak = $contact->first();
        $data = [
            'title' => 'Contact Us | WARJAM Restorasi',
            'contact' => $kontak,
        ];
        echo view('front/pages/contact', $data);
    }
}
