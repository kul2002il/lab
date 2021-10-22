<?php

use yii\db\Migration;

class m210911_123458_createFileTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('file', [
			'id' => $this->primaryKey(),
			'idOwner' => $this->integer()->notNull(),
			'path' => $this->string()->notNull()->unique(),
		]);
		$this->addForeignKey('UserFile', 'file', 'idOwner', 'user', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('UserFile', 'file');
		$this->dropTable('file');
	}
}
