<?php

use yii\db\Migration;

class m210911_114740_createBrandTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('brand', [
			'id' => $this->primaryKey(),
			'name' => $this->string(80)->notNull()->unique(),
		]);
	}
	
	public function safeDown()
	{
		$this->dropTable('brand');
	}
}
