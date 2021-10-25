<?php

use yii\db\Migration;

class m210911_125607_createPurposeTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('purpose', [
			'id' => $this->primaryKey(),
			'name' => $this->string(80)->notNull()->unique(),
			'code' => $this->string(40)->notNull()->unique(),
		]);
	}
	
	public function safeDown()
	{
		$this->dropTable('purpose');
	}
}
