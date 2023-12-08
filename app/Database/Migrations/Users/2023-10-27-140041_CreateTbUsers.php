<?php

namespace App\Database\Migrations\Users;

use CodeIgniter\Database\Migration;

class CreateTbUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'=>[
				'type'=>'int',
				'auto_increment'=>true
			],
			'username'=>[
				'type'=>'varchar',
				'constraint'=>'255',
			],
			'firstname'=>[
				'type'=>'varchar',
				'constraint'=>'255',
				'null'=>true
			],
			'lastname'=>[
				'type'=>'varchar',
				'constraint'=>'255',
				'null'=>true
			],
			'email'=>[
				'type'=>'varchar',
				'constraint'=>'255',
				'null'=>true
			],
			'phone'=>[
				'type'=>'int',
				'constraint'=>'10',
				'null'=>true
			],
			'birthday'=>[
				'type'=>'date',
				'null'=>true
			],
			'password'=>[
				'type'=>'varchar',
				'constraint'=>'255',
			],
			'slug'=>[
				'type'=>'text'
			],
			'created_at'=>[
				'type'=>'timestamp',
				'null'=>true
			],
			'updated_at'=>[
				'type'=>'timestamp',
				'null'=>true
			]
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('tb_users');
    }

    public function down()
    {
        $this->forge->dropTable('tb_users');
    }
}
