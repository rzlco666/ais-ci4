<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Project extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_project'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_project'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'deskripsi_project'       => [
				'type'           => 'TEXT',
			],
			'owner'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'no_telp' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'thumbnail'       => [
				'type'           => 'TEXT',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addPrimaryKey('id_project');
		$this->forge->createTable('project');
	}

	public function down()
	{
		$this->forge->dropTable('project');
	}
}
