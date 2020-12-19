<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MenuMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'menu_id'  => [
				'type'           => 'INT',
				'constraint'     => 8,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_menu'     => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug_menu'     => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'deskripsi' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'harga'     => [
				'type'           => 'INT',
				'constraint'     => 8,
			],
			'foto' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'jenis_menu_id' => [
				'type'           => 'INT',
				'constraint'     => 8,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
		]);
		$this->forge->addKey('menu_id', true);
		$this->forge->createTable('menu');
	}

	public function down()
	{
		$this->forge->dropTable('jenis_menu');
	}
}
