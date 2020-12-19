<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisMenuMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'jenis_menu_id'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_jenis'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'slug_jenis'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('jenis_menu_id', true);
        $this->forge->createTable('jenis_menu');
    }

    public function down()
    {
        $this->forge->dropTable('jenis_menu');
    }
}
