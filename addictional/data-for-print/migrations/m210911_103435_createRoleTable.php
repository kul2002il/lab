<?php

use yii\db\Migration;

class m210911_103435_createRoleTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('role', [
			'id' => $this->primaryKey(),
			'name' => $this->string(80)->notNull()->unique(),
			'code' => $this->string(40)->notNull()->unique(),
		]);
	}

	public function safeDown()
	{
		$this->dropTable('role');
	}
}
