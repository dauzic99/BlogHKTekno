<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class MenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_menu' => 'Capuccino',
                'slug_menu' => 'capuccino',
                'deskripsi' => 'lorem ipsum',
                'harga' => 10000,
                'foto' => '1.png',
                'jenis_menu_id' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_menu' => 'Nasi Padang',
                'slug_menu' => 'nasi-padang',
                'deskripsi' => 'lorem ipsum',
                'harga' => 15000,
                'foto' => '1.png',
                'jenis_menu_id' => 2,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_menu' => 'French Fries',
                'slug_menu' => 'french-fries',
                'deskripsi' => 'lorem ipsum',
                'harga' => 10000,
                'foto' => '1.png',
                'jenis_menu_id' => 3,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        foreach ($data as $datas) {
            $this->db->table('menu')->insert($datas);
        }
    }
}
