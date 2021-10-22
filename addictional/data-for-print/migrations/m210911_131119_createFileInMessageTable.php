<?php

use yii\db\Migration;

class m210911_131119_createFileInMessageTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('file_in_message', [
			'id' => $this->primaryKey(),
			'idMessage' => $this->integer()->notNull(),
			'idFile' => $this->integer()->notNull(),
		]);
		$this->addForeignKey('MessageWithFile', 'file_in_message', 'idMessage', 'message', 'id');
		$this->addForeignKey('FileInMessage', 'file_in_message', 'idFile', 'file', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('MessageWithFile', 'file_in_message');
		$this->dropForeignKey('FileInMessage', 'file_in_message');
		$this->dropTable('file_in_message');
	}
}
