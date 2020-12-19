<?php

namespace App\Database\Seeds;

class JenisMenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jenis' => 'Minuman',
                'slug_jenis' => 'minuman',
            ],
            [
                'nama_jenis' => 'Makanan',
                'slug_jenis' => 'makanan',
            ],
            [
                'nama_jenis' => 'Snack',
                'slug_jenis' => 'snack',
            ],
        ];

        foreach ($data as $datas) {
            $this->db->table('jenis_menu')->insert($datas);
        }
    }
}
