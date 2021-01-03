<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Alwan',
                'username' => 'admin',
                'password' => 'admin',
                'role_id' => 1,
            ],
            [
                'nama_lengkap' => 'Daus',
                'username' => 'daus',
                'password' => 'daus',
                'role_id' => 2,
            ],

        ];

        foreach ($data as $datas) {
            $this->db->table('user')->insert($datas);
        }
    }
}
