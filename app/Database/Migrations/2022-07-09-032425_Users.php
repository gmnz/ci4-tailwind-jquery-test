<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
		$this->forge->addField([
			'user_id' => [
				'type' 				=> 'INT',
				'unsigned'			=> true,
				'auto_increment' 	=> true,
			],
			'name' => [
				'type' 				=> 'VARCHAR',
				'constraint'		=> '255',
			],
			'avatar' => [
				'type' 				=> 'VARCHAR',
				'constraint'		=> '255',
			],
			'email' => [
				'type' 				=> 'VARCHAR',
				'constraint'		=> '255',
			],
			'password' => [
				'type' 				=> 'VARCHAR',
				'constraint'		=> '255',
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
		]);
		$this->forge->addKey('user_id', true);
		$this->forge->createTable('users');
    }

    public function down()
    {
		$this->forge->dropTable('blog');
    }
}
