<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Daerah extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'daerah_id'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_daerah'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'slug_daerah'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'ongkos'     => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('daerah_id', true);
        $this->forge->createTable('daerah');
    }

    public function down()
    {
        $this->forge->dropTable('daerah');
    }
}
