<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_Contact;

class Contact extends Controller
{
    public function edit()
    {
        $contact = new Model_Contact();
        $kontak = $contact->first();
        $data = [
            'title' => 'Edit Kontak Warjam| WARJAM Admin Page',
            'kontak' => $kontak,
        ];
        echo view('admin/pages/contact/edit', $data);
    }
    public function editContact()
    {
        $contact = new Model_Contact();
        $contact->save([
            'contact_id' => 1,
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        return redirect()->to('/admin/contact')->with('success', 'Kontak Anda Telah Berhasil Diperbaharui');
    }

    public function editSocmed()
    {
        $contact = new Model_Contact();
        $contact->save([
            'contact_id' => 1,
            'email' => $this->request->getVar('email'),
            'facebook' => $this->request->getVar('facebook'),
            'twitter' => $this->request->getVar('twitter'),
            'instagram' => $this->request->getVar('instagram'),
            'youtube' => $this->request->getVar('youtube'),
            'gmaps' => $this->request->getVar('gmaps'),
        ]);
        return redirect()->to('/admin/contact')->with('Pass_success', 'Kontak Anda Telah Berhasil Diperbaharui');
    }
}
