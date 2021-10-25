<?php

use yii\db\Migration;

class m210911_124506_createNewsTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('news', [
			'id' => $this->primaryKey(),
			'idFile' => $this->integer(),
			'title' => $this->string(80)->notNull(),
			'content' => $this->text()->notNull(),
			'datetime' => $this->dateTime()->notNull()->defaultExpression('NOW()'),
		]);
		$this->addForeignKey('NewsFile', 'news', 'idFile', 'file', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('NewsFile', 'news');
		$this->dropTable('news');
	}
}
