<?php

namespace App\Database\Migrations\Articles;

use CodeIgniter\Database\Migration;

class CreateTbArticles extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'=>[
				'type'=>'int',
				'auto_increment'=>true
			],
			'title'=>[
				'type'=>'varchar',
				'constraint'=>'255',
				'null'=>true
			],
			'content'=>[
				'type'=>'text',
				'null'=>true
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
		$this->forge->createTable('tb_articles');
    }

    public function down()
    {
        $this->forge->dropTable('tb_articles');
    }
}
