<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_JenisMenu;
use App\Models\Model_Menu;
use App\Models\Model_Contact;
use App\Models\Model_SecretMenu;
use App\Models\Model_SecretJenis;
use App\Models\Model_Meja;

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

    public function secret($unique_key)
    {
        $jenis = new Model_SecretJenis();
        $menu = new Model_SecretMenu();
        $meja = new Model_Meja();

        $table = $meja->where('unique_key', $unique_key)->first();

        $session = session();
        if (!$session->has('nomor_meja')) {
            $session->set('nomor_meja', $table['nomor_meja']);
        }

        $type = $jenis->findAll();
        $data = [
            'title' => 'Menu | WARJAM Restorasi',
            'jenis' => $type,
        ];
        echo view('front/pages/secret', $data);
    }

    public function cek()
    {
        if (!session()->secret) {
            dd(session()->nomor_meja);
        }
    }
}
