<?php

namespace App\Database\Seeds;

class TestSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('jenisMenuSeeder');
        $this->call('MenuSeeder');
        $this->call('DaerahSeeder');
        $this->call('UserSeeder');
        $this->call('RoleSeeder');
    }
}
