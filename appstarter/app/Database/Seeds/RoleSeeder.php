<?php

namespace App\Database\Seeds;

class RoleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_role' => 'admin',
            ],
            [
                'nama_role' => 'pegawai',
            ],

        ];

        foreach ($data as $datas) {
            $this->db->table('role')->insert($datas);
        }
    }
}
