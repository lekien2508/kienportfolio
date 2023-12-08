<?php

namespace App\Database\Migrations\Articles;

use CodeIgniter\Database\Migration;

class AlterTbArticles1 extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_articles',[
			'categories_id'=>[
				'type'=>'int',
				'null'=>false
			]
		]);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_articles', 'categories_id');
    }
}
