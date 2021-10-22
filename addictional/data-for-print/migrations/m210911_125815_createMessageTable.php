<?php

use yii\db\Migration;

class m210911_125815_createMessageTable extends Migration
{
	public function safeUp()
	{
		$this->createTable('message', [
			'id' => $this->primaryKey(),
			'idSender' => $this->integer()->notNull(),
			'idRepair' => $this->integer()->notNull(),
			'idPurpose' => $this->integer(),
			'content' => $this->text()->notNull(),
			'datetime' => $this->dateTime()->notNull()->defaultExpression('NOW()'),
		]);
		$this->addForeignKey('SenderMessage', 'message', 'idSender', 'user', 'id');
		$this->addForeignKey('MessageRepair', 'message', 'idRepair', 'repair', 'id');
		$this->addForeignKey('MessagePurpose', 'message', 'idPurpose', 'purpose', 'id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('SenderMessage', 'message');
		$this->dropForeignKey('MessageRepair', 'message');
		$this->dropTable('message');
	}
}
