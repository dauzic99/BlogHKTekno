<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_id'  => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_role'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],

        ]);
        $this->forge->addKey('role_id', true);
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}
