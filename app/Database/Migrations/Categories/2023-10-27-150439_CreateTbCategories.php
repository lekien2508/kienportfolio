<?php

namespace App\Database\Migrations\Categories;

use CodeIgniter\Database\Migration;

class CreateTbCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'=>[
				'type'=>'int',
				'auto_increment'=>true
			],
			'name'=>[
				'type'=>'varchar',
				'constraint'=>'255'
			],
			'slug'=>[
				'type'=>'text',
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
		$this->forge->createTable('tb_categories');
    }

    public function down()
    {
		$this->forge->dropTable('tb_categories');
    }
}
