<?php

namespace App\Database\Seeds;

class DaerahSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_daerah' => 'penajam',
                'slug_daerah' => 'penajam',
                'ongkos' => 5000,
            ],
            [
                'nama_daerah' => 'nipah-nipah',
                'slug_daerah' => 'nipah-nipah',
                'ongkos' => 8000,
            ],
            [
                'nama_daerah' => 'grimukti',
                'slug_daerah' => 'grimukti',
                'ongkos' => 10000,
            ],
            [
                'nama_daerah' => 'petung',
                'slug_daerah' => 'petung',
                'ongkos' => 15000,
            ],


        ];

        foreach ($data as $datas) {
            $this->db->table('daerah')->insert($datas);
        }
    }
}
