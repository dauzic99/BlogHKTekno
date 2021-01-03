<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'  => [
                'type'           => 'INT',
                'constraint'     => 8,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'username'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'password'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'role_id'     => [
                'type'           => 'INT',
                'constraint'     => 8,
            ],
            'is_active'     => [
                'type'           => 'INT',
                'constraint'     => 1,
                'null'     => TRUE,
            ],
            'last_login_at' => [
                'type'           => 'DATETIME',
                'null'     => TRUE,
            ],

        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
